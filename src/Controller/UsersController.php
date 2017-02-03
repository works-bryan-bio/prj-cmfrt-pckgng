<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $helpers = ['NavigationSelector'];

    /**
     * initialize method     
     * 
     */
    public function initialize()
    {
        parent::initialize();
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper       
        $nav_selected = ["dashboard"];

        $session = $this->request->session();    
        $user_data = $session->read('User.data');         
        if( isset($user_data) ){
            if( $user_data->user->group_id == 1 ){ //Company
                $this->Auth->allow();
            }elseif( $user_data->user->group_id == 2 ){ //Manager
                $this->Auth->allow(['user_dashboard']);
            }elseif( $user_data->user->group_id == 3 ){ //Employee
                $this->Auth->allow(['user_dashboard']);
            }elseif( $user_data->user->group_id == 4 ){ //Client
                $this->Auth->allow(['user_dashboard']);
            }      
        }
        $this->set('nav_selected', $nav_selected);

        //$this->Auth->allow();
    }

    /**
     * beforeFilter method     
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'login']);
    }

    /**
     * Index method     
     * @return void
     */
    public function index()
    {
        $user = $this->Users->find('all', [
            'contain' => ['Groups']
        ]);
        $this->set('users', $this->paginate($user));
        $this->set('_serialize', ['users']);
    }

    /**
     * Master Admin Dashboard method     
     * @return void
     */
    public function dashboard()
    {        
        $this->set('page_title', 'Dashboard');
    }

    /**
     * User Dashboard method     
     * @return void
     */
    public function user_dashboard()
    {        
        $this->set('page_title', 'Dashboard');
    }   

    /**
     * View method     
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ["Groups"]
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method     
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {      
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method     
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $result = $this->Users->save($user);
            if ($result) {
                $this->Flash->success(__('User data has been updated.'));
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('User data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

         $this->set('groups', $this->Users->Groups->find('list', array('fields' => array('name','id') ) ) );
    }

    /**
     * delete method     
     * @return void
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        /*if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }*/
        $this->Flash->error(__('Deleting of user is currently disabled.'));
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login     
     * lagin module then redirect to dashboard
     */
    public function login()
    {   
        $this->Clients = TableRegistry::get('Clients');     
        $this->viewBuilder()->layout("Users/login");        
        
        //if already logged-in, redirect
        if($this->Auth->user()){
            $session = $this->request->session();    
            $user_data = $session->read('User.data');
            if( $user_data->user->group_id == 1 ){ //Master Admin
                $this->redirect(array('action' => 'dashboard'));      
            }else{
                return $this->redirect(['action' => 'user_dashboard']);   
            }            
        }

        if ($this->request->is('post')) {           
            $user = $this->Auth->identify();            
            if ($user) {                   
                if( $user['group_id'] == 4 ){                 
                    $user_data = $this->Clients->find()   
                        ->contain(['Users'])             
                        ->where(['Clients.user_id' => $user['id']])
                        ->first()
                    ; 
                }else{
                    $user_data = $this->Users->UserEntities->find()   
                        ->contain(['Users'])             
                        ->where(['UserEntities.user_id' => $user['id']])
                        ->first()
                    ; 
                }                
                if( $user_data->is_active == 1 ){
                    //$group_id = $user_data->user->group_id;    
                    $session  = $this->request->session();  
                    $session->write('User.data', $user_data);                

                    $this->Auth->setUser($user);
                    $_SESSION['KCEDITOR']['disabled'] = false;
                    $_SESSION['KCEDITOR']['uploadURL'] = Router::url('/')."webroot/upload";
                    
                         
                    if( $user_data->user->group_id == 1 ){ //Company
                        return $this->redirect($this->Auth->redirectUrl());      
                    }else{
                        return $this->redirect(['action' => 'user_dashboard']);
                    }        
                }else{
                    $this->Flash->error(__('Account inactive. Cannot login.'));
                    return $this->redirect(['action' => 'login']);
                }                
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set([
            'page_title' => 'User Login'            
        ]);
    }

    /**
     * logout     
     * logout user and go back to login page
     */
    public function logout()
    {
        session_start();
        session_destroy();
        return $this->redirect($this->Auth->logout());
    }
}
