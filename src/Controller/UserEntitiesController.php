<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


/**
 * UserEntities Controller
 *
 * @property \App\Model\Table\UserEntitiesTable $UserEntities */
class UserEntitiesController extends AppController
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
                $this->Auth->allow(['employees','edit_employee','view_employee']);
            }  
        }
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["users"];
        $this->set('nav_selected', $nav_selected);
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
            'contain' => ['Users']
        ];
        $this->set('userEntities', $this->paginate($this->UserEntities));
        $this->set('_serialize', ['userEntities']);
    }

    /**
     * Master admin employee list method
     *
     * @return void
     */
    public function employees()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => ['Users.group_id' => 3]
        ];
        $this->set('userEntities', $this->paginate($this->UserEntities));
        $this->set('_serialize', ['userEntities']);
    }

    /**
     * View method
     *
     * @param string|null $id User Entity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEntity = $this->UserEntities->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userEntity', $userEntity);
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * View Employee method
     *
     * @param string|null $id User Entity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view_employee($id = null)
    {
        $userEntity = $this->UserEntities->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userEntity', $userEntity);
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Groups = TableRegistry::get('Groups');
        $this->Users  = TableRegistry::get('Users');

        $userEntity = $this->UserEntities->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($result = $this->Users->save($user)) {
                $this->request->data['user_id']   = $result->id;
                $this->request->data['is_active'] = 1;
                $userEntity = $this->UserEntities->patchEntity($userEntity, $this->request->data);
                if ($this->UserEntities->save($userEntity)) {
                    $this->Flash->success(__('The user entity has been saved.'));
                    $action = $this->request->data['save'];
                    if( $action == 'save' ){
                        return $this->redirect(['action' => 'index']);
                    }else{
                        return $this->redirect(['action' => 'add']);
                    }                    
                } else {
                    $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
            }
        }
        $users  = $this->UserEntities->Users->find('list');        
        $groups = $this->Groups->find('list')
            ->where(['Groups.id <>' => 4])
        ;
        $this->set(compact('userEntity', 'users', 'groups'));
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * Manager Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add_employee()
    {
        $this->Groups = TableRegistry::get('Groups');
        $this->Users  = TableRegistry::get('Users');

        $userEntity = $this->UserEntities->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $this->request->data['group_id'] = 3;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($result = $this->Users->save($user)) {
                $this->request->data['user_id']   = $result->id;
                $this->request->data['is_active'] = 1;
                $userEntity = $this->UserEntities->patchEntity($userEntity, $this->request->data);
                if ($this->UserEntities->save($userEntity)) {
                    $this->Flash->success(__('The user entity has been saved.'));
                    $action = $this->request->data['save'];
                    if( $action == 'save' ){
                        return $this->redirect(['action' => 'employees']);
                    }else{
                        return $this->redirect(['action' => 'add_employee']);
                    }                    
                } else {
                    $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
            }
        }
        $users  = $this->UserEntities->Users->find('list');                
        $this->set(compact('userEntity', 'users'));
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Entity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEntity = $this->UserEntities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEntity = $this->UserEntities->patchEntity($userEntity, $this->request->data);
            if ($this->UserEntities->save($userEntity)) {
                $this->Flash->success(__('The user entity has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserEntities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEntity', 'users'));
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * Edit Employee method
     *
     * @param string|null $id User Entity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_employee($id = null)
    {
        $userEntity = $this->UserEntities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEntity = $this->UserEntities->patchEntity($userEntity, $this->request->data);
            if ($this->UserEntities->save($userEntity)) {
                $this->Flash->success(__('The user entity has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'employees']);
                }else{
                    return $this->redirect(['action' => 'edit_employee', $id]);
                }         
            } else {
                $this->Flash->error(__('The user entity could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserEntities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEntity', 'users'));
        $this->set('_serialize', ['userEntity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Entity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session   = $this->request->session();    
        $user_data = $session->read('User.data');         

        $this->request->allowMethod(['post', 'delete']);
        $userEntity = $this->UserEntities->get($id);
        if ($this->UserEntities->delete($userEntity)) {
            $this->Flash->success(__('The user entity has been deleted.'));
        } else {
            $this->Flash->error(__('The user entity could not be deleted. Please, try again.'));
        }        
        if( isset($user_data) ){
            if( $user_data->user->group_id == 1 ){ //Company
                return $this->redirect(['action' => 'index']);
            }elseif( $user_data->user->group_id == 2 ){ //Manager
                return $this->redirect(['action' => 'employees']);
            }  
        }else{
            return $this->redirect(['action' => 'index']);
        }        
    }
}
