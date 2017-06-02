<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;
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
                $this->Auth->allow(['client_dashboard']);
            }      
        }
        $this->set('nav_selected', $nav_selected);

        $this->Auth->allow();
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
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
            'inventory_order' => $inventory_order
        ]);

        $this->set('page_title', 'Dashboard');
    }

    /**
     * Client Dashboard method     
     * @return void
     */
    public function client_dashboard()
    {   
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Invoice   = TableRegistry::get('Invoice');

        $session = $this->request->session();    
        $user_data = $session->read('User.data');  

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $pendingInvoice = $this->Invoice->find('all')
            ->contain(['Clients', 'Shipments'])
            ->where(['Invoice.clients_id' => $user_data->id, 'Invoice.status' => 1])
            ->order(['Invoice.id' => 'DESC'])
        ;

        $this->set(['pendingShipments' => $pendingShipments, 'completedShipments' => $completedShipments, 'pendingInvoice' => $pendingInvoice]);
        $this->set('page_title', 'Dashboard');
    }

    /**
     * User Dashboard method     
     * @return void
     */
    public function user_dashboard()
    {        
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;
       

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['InventoryOrder.date_created' => 'DESC'])
        ;


        // debug($inventory_order);

        // exit;

        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
            'inventory_order' => $inventory_order
        ]);

        $this->set('page_title', 'Dashboard');
    }   

      /**
     * User Dashboard method     
     * @return void
     */
    public function user_shipment_overdue_dashboard()
    {        
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;
       

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $shipment_overdue = $this->Shipments->find('all')
            ->contain(['Clients','ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith'])
            ->where([ 'Shipments.status' => 1 ])
        ;
         
        
        // debug($shipment_overdue);
        // exit;
         
            
        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
             'inventory_order' => $inventory_order,
            'shipment_overdue' => $shipment_overdue
        ]);

        $this->set('page_title', 'Dashboard');
    }

      /**
     * User Dashboard method     
     * @return void
     */
    public function user_order_overdue_dashboard()
    {        
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;
       

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

         $order_overdue = $this->InventoryOrder->find('all')
            ->contain(['Clients', 'Shipments'])
            ->where([ 'order_status' => 'Pending' ])
            ->andWhere(['date_created <=' => date('Y-m-d')])
            ; 
         
       
        
        // foreach ($order_overdue as $order_overdue) {
        //     debug($order_overdue);
        //     exit;
        // }

         
            
        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
            'inventory_order' => $inventory_order,
            'order_overdue' => $order_overdue
        ]);

        $this->set('page_title', 'Dashboard');
    }

      /**
     * User Dashboard method     
     * @return void
     */
    public function user_unanswered_messages_dashboard()
    {        
        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->Message = TableRegistry::get('Message');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;
       
        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

       
         $conn = ConnectionManager::get('default');
        if($user_data->user->group_id == 4){
            echo "test";
            $sql = 'SELECT * ,(SELECT message_details.user_group FROM message_details WHERE message_details.message_id = message.id ORDER BY message_details.date_created DESC LIMIT 1 ) AS user_group FROM message WHERE message.client_id = '.$user_data->id .' ';

            $stmt       = $conn->query($sql);        
            $message_count = $stmt->fetchAll('assoc');

            $message = 0;
            foreach ($message_count as $value) {
                if($value['user_group'] == 2){
                    $message++;
                }
            }
        }else{

            $sql = 'SELECT * ,(SELECT message_details.user_group FROM message_details WHERE message_details.message_id = message.id ORDER BY message_details.date_created DESC LIMIT 1 ) AS user_group FROM message';

            $stmt       = $conn->query($sql);        
            $message_count = $stmt->fetchAll('assoc');

            $message = 0;
            foreach ($message_count as $value) {
                if($value['user_group'] == 4){
                    $message++;
                }
            }
        }

        debug($message_count);
        exit;



         // $order_overdue = $this->InventoryOrder->find('all')
         //    ->contain(['Clients', 'Shipments'])
         //    ->where([ 'order_status' => 'Pending' ])
         //    ->andWhere(['date_created <=' => date('Y-m-d')])
         //    ; 
         
       
        
        // foreach ($order_overdue as $order_overdue) {
        //     debug($order_overdue);
        //     exit;
        // }

         
            
        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
            'inventory_order' => $inventory_order,
            'order_overdue' => $order_overdue
        ]);

        $this->set('page_title', 'Dashboard');
    }


        /**
     * User Dashboard method     
     * @return void
     */
    public function user_send_to_amazon_dashboard()
    {        
        $this->Shipments = TableRegistry::get('Shipments');
        $this->Inventory = TableRegistry::get('Inventory');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');
        $conn = ConnectionManager::get('default');

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])            
        ;
       

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])            
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])         
        ;

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

          $date = date('Y-m-d');
          // $sql_send_to_amazon = 'SELECT * FROM `shipments` WHERE status IN(3,4) AND shipping_purpose_id = 2 AND  `amazon_shipment_date` <= "'. $date .'" ';
          // echo $sql_send_to_amazon
          // $stmt       = $conn->query($sql_send_to_amazon);        
          // $send_to_amazon_count = $stmt->fetchAll('assoc');

          $ids = array('3','4');
         $send_to_amazon = $this->Shipments->find('all')
            ->contain(['Clients', 'ShippingCarriers', 'ShippingServices', 'ShippingPurposes'])
            ->where(['Shipments.status IN' => $ids])
            ->andWhere(['Shipments.shipping_purpose_id' => 2])
            ->andWhere(['Shipments.amazon_shipment_date <' => $date])
         ;

          //debug($send_to_amazon);
            // exit; 
       
        
        // foreach ($send_to_amazon as $sta) {
        //     debug($sta);
        //    // exit;
        // }

        //  exit;
            
        $this->set([
            'pendingShipments' => $pendingShipments,
            'completedShipments' => $completedShipments,
            'receivedAndStoredShipments' => $receivedAndStoredShipments,
            'inventory_order' => $inventory_order,
            'send_to_amazon' => $send_to_amazon
        ]);

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
                    $_SESSION['KCEDITOR']['uploadURL'] = Router::url('/')."webroot/upload/".$user_data->user_id;
                    
                         
                    if( $user_data->user->group_id == 1 ){ //Company
                        return $this->redirect($this->Auth->redirectUrl());      
                    }elseif( $user_data->user->group_id == 4 ){ // client
                        return $this->redirect(['action' => 'client_dashboard']);
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
