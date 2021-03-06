<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients */
class ClientsController extends AppController
{
    /**
     * Initialize method
     * ID : CA-01
     *
     */
    public function initialize()
    {
        parent::initialize();

        $session = $this->request->session();    
        $user_data = $session->read('User.data');         
        if( isset($user_data) ){
            if( $user_data->user->group_id == 1 ){ //Company
                $this->Auth->allow();
            }elseif( $user_data->user->group_id == 2 ){ //Manager
                $this->Auth->allow(['index','add', 'view', 'edit', 'history']);
            }elseif( $user_data->user->group_id == 3 ){ //Employee
                $this->Auth->allow(['index']);
            }  
        }

        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["clients"];
        $this->set('nav_selected', $nav_selected);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {        
        $clients = $this->Clients->find('all')
            ->contain(['Users'])
        ;

        $this->set('clients', $clients);
        $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Users', 'ProjectProposals', 'Projects']
        ]);
        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Users  = TableRegistry::get('Users');
        
        $client = $this->Clients->newEntity();

        if ($this->request->is('post')) {
            $this->request->data['group_id'] = 4;
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($result = $this->Users->save($user)) {
                $this->request->data['user_id']   = $result->id;
                $this->request->data['is_active'] = 1;
                $client = $this->Clients->patchEntity($client, $this->request->data);
                if ($this->Clients->save($client)) {
                    $this->Flash->success(__('The client has been saved.'));
                    $action = $this->request->data['save'];
                    if( $action == 'save' ){
                        return $this->redirect(['action' => 'index']);
                    }else{
                        return $this->redirect(['action' => 'add']);
                    }                    
                } else {
                    $this->Flash->error(__('The client could not be saved. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $this->set(compact('client', 'users'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function history($client_id = null)
    {
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 
        
        if($client_id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $client = $this->Clients->get($client_id, [
            'contain' => []
        ]);

        $shipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Clients.id' => $client_id])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventories = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.client_id' => $client_id])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $this->set('group_id' , $user_data->user->group_id);
        $this->set(['shipments' => $shipments, 'client' => $client, 'inventories' => $inventories]);
    }
}
