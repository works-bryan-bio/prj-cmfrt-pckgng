<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ProfileController extends AppController
{
    /**
     * Initialize method
     * ID : CA-01
     *
     */
    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ['users'];
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
        $session = $this->request->session();    
        $userEntity = $session->read('User.data');

        $this->set( ['userEntity' => $userEntity]);
    }

    /**
     * Change Password method     
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function change_password()
    {      
        $this->UserEntities = TableRegistry::get('UserEntities');
        $session      = $this->request->session();    
        $user_session = $session->read('User.data');       

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            if( $data['password'] == $data['repassword'] ){
                
                $user = $this->UserEntities->Users->get($user_session->user->id);
                $user->password = $data['password'];                
                
                if( $this->UserEntities->Users->save($user) ){
                    //Update is_enabled
                    $user_entity = $this->UserEntities->get($user_session->id);
                    if( $user_entity->is_password_changed == 0 ){
                        $user_entity->is_password_changed = 1;
                        $this->UserEntities->save($user_entity);
                    }

                    //Send email
                    $edata = [
                        'user_name' => $user_session->firstname,
                        'password' => $data['password']                        
                    ];
                    $recipient = $user_session->email;                     
                    
                    $this->Flash->success(__('Your password has been changed.'));
                    return $this->redirect(['controller' => 'profile', 'action' => 'index']);
                }else{
                    $this->Flash->error(__('Your password could not be change. Please, try again.'));                    
                }
            }else{
                $this->Flash->error(__('Password does not match!'));                    
            }
        }

        $load_form_css = true;
        $this->set(['user_data' => $user_session, 'load_form_css' => $load_form_css]);
    }

    /**
     * Edit method
     *     
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $this->UserEntities = TableRegistry::get("UserEntities");
        $this->Clients = TableRegistry::get("Clients");

        $session = $this->request->session();    
        $user_data = $session->read('User.data');

        if($user_data->user->group_id == 4) {
            $userEntity = $this->Clients->get($user_data->id, [
                'contain' => []
            ]);
            $obj = "Clients";
        }else{
            $userEntity = $this->UserEntities->get($user_data->id, [
                'contain' => []
            ]);
            $obj = "UserEntities";
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {            

            //Update user entity data            
            $userEntity    = $this->$obj->patchEntity($userEntity, $this->request->data);
            if ($this->$obj->save($userEntity)) {
                $this->Flash->success(__('Profile has been updated.'));

                //Update user session
                if( $user_data->user->group_id == 4 ){                 
                    $userEntity = $this->Clients->find()   
                        ->contain(['Users'])             
                        ->where(['Clients.user_id' => $user_data->user_id])
                        ->first()
                    ; 
                }else{
                    $userEntity = $this->Users->UserEntities->find()   
                        ->contain(['Users'])             
                        ->where(['UserEntities.user_id' => $user_data->user_id])
                        ->first()
                    ; 
                }  
                $session  = $this->request->session();  
                $session->write('User.data', $userEntity); 
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Cannot update profile. Please, try again.'));
            }
        }
        $gender   = array("Male" => "Male", "Female" => "Female");
        $this->set(compact('userEntity', 'agencies', 'groups', 'gender'));
        $this->set('_serialize', ['userEntity']);
    }

    
}
