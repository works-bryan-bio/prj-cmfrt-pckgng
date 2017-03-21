<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Message Controller
 *
 * @property \App\Model\Table\MessageTable $Message */
class MessageController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $session = $this->request->session();    
        $user_data = $session->read('User.data');         
        if( isset($user_data) ){
            if( $user_data->user->group_id == 1 ){ //Company
                $this->Auth->allow();
            }elseif( $user_data->user->group_id == 2 ){ //Manager
                $this->Auth->allow(['index','add']);
            }elseif( $user_data->user->group_id == 4 ){ //Client
                $this->Auth->allow(['client', 'client_add', 'client_edit', 'client_view']);
            }  
        }
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["message"];
        $this->set('nav_selected', $nav_selected);
        $this->set(['load_message_script' => true]);
        $this->Auth->allow();

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $clients = $this->Message->Clients->find('all');
        $this->set(compact( 'clients'));
        $this->set('message', $this->paginate($this->Message));
        $this->set('_serialize', ['message']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Message->get($id, [
            'contain' => ['Clients', 'MessageDetails']
        ]);
        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        if( $user_data->user->group_id == 2 ){ //Manager
        }elseif( $user_data->user->group_id == 4 ){ //Client
            $this->request->data['client_id'] = $user_data->id;
        }

        $message = $this->Message->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['date_created'] = date("Y-m-d H:i:s"); 
            $message = $this->Message->patchEntity($message, $this->request->data);
            if ($this->Message->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['action' => 'index']);                   
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
        $clients = $this->Message->Clients->find('list', ['limit' => 200]);
        $this->set(['user_data' => $user_data]);
        $this->set(compact('message', 'clients'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Message->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Message->patchEntity($message, $this->request->data);
            if ($this->Message->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Message->Clients->find('list', ['limit' => 200]);
        $this->set(compact('message', 'clients'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Message->get($id);
        if ($this->Message->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function load_message_header()
    {
        $this->viewBuilder()->layout('');
        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 
        $message_header = array();
        $is_manager = false;        
        if( isset($user_data) ){
            if( $user_data->user->group_id == 2 ){ //Manager
                $is_manager = true;
                $message_header = $this->Message->find('all')
                    ->contain(['Clients'])
                    ->order(['Message.date_created' => 'DESC']);
            }elseif( $user_data->user->group_id == 4 ){ //Client
                $message_header = $this->Message->find('all')->where(['Message.client_id' => $user_data->id])->order(['Message.date_created' => 'DESC']);
            }
        }
        $this->set(['message_header' => $message_header, 'is_manager' => $is_manager]);
    }

    public function load_message_details()
    {
        $this->viewBuilder()->layout('');
        $id = $this->request->data['message_id'];
        $message_header = $this->Message->get($id, [
            'contain' => ['Clients']
        ]);

        $this->MessageDetails = TableRegistry::get('MessageDetails');
        $message_details = $this->MessageDetails->find('all')
            ->contain(['Message' => ['Clients'], 'Users' => ['UserEntities'] ])
            ->where(['MessageDetails.message_id' => $id])
            ->order(['MessageDetails.date_created' => 'DESC']);

        $this->set(['message_header' => $message_header, 'message_details' => $message_details]);
    }

    public function send()
    {
        $this->request->allowMethod(['post']);
        $data = $this->request->data;

        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        $data['user_id'] = $user_data->user->id;
        $data['user_group'] = $user_data->user->group_id;
        $data['date_created'] = date("Y-m-d H:i:s");

        $this->MessageDetails = TableRegistry::get('MessageDetails');
        $message_details = $this->MessageDetails->newEntity();
        $message_details = $this->MessageDetails->patchEntity($message_details, $data);
        $this->MessageDetails->save($message_details);
        echo json_encode(array('message_id' => $data['message_id'] ));
        exit;
    }

}
