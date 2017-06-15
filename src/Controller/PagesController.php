<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{
    public $helpers  = ['NavigationSelector','Siezi/SimpleCaptcha.SimpleCaptcha'];
    public $paginate = ['maxLimit' => 10];

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
        $this->Auth->allow(['frontview','contact_us','ajax_email_inquiry','ajax_email_newsletter','search', 'search_admin']);
        $nav_selected = ["pages"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('pages', $this->paginate($this->Pages));
        $this->set('_serialize', ['pages']);
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * frontview method        
     */
    public function frontview($id = null) {     
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        $this->viewBuilder()->layout("main_no_slider");         
        $this->set(['page' => $page, 'page_title' => $page->title]);        
    }

    /**
     * Email inquiry
     * 
     */
    public function ajax_email_inquiry()
    {
        $json_data = [
            "is_success" => true,
            'message' => '<div class="label label-success fade in">Email was successfully sent!</div>'
        ];        

        if ($this->request->is('post')) {
            $edata = $this->request->data;   

            $validator = new \Siezi\SimpleCaptcha\Model\Validation\SimpleCaptchaValidator();
            $errors = $validator->errors($this->request->data);
            if( !empty($errors['captcha']) ){
                $json_data['is_success'] =  false;
                $json_data['message']    = "<div class=\"alert alert-danger\" role=\"alert\">Invalid captcha entry</div>";
                $this->viewBuilder()->layout('');        
                echo json_encode($json_data);
                exit;
            }

            $is_with_null = false;
            foreach( $edata as $key => $value ){
                if( trim($value) == '' && ($key != "homepage") ){
                    $is_with_null = true;
                }
            }     

            if( !$is_with_null ){
                //$recipient = "info@broproweb.com";        
                $recipient = "works.bryan.bio@gmail.com";        
                $email_smtp = new Email('default');
                $email_smtp->from(['broprowebsystem@gmail.com' => 'WebSystem'])
                    ->template('inquiry')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('BroProWeb : Inquiry')
                    ->viewVars(['inquiry' => $edata])
                    ->send();    
            }else{
                $json_data = [
                    "is_success" => false,
                    'message' => '<div class="label label-danger fade in">Please fill up the form!</div>'
                ];  
            }
        }else{
           $json_data = [
                "is_success" => false,
                'message' => '<div class="label label-danger fade in">Please fill up the form!</div>'
            ]; 
        }
        
        echo json_encode($json_data);
        $this->viewBuilder()->layout('');
        exit;  
    }

    /**
     * Email newsletter request
     * 
     */
    public function ajax_email_newsletter()
    {
        $json_data = [
            "is_success" => true,
            'message' => '<div class="label label-success fade in">Email was successfully sent!</div>'
        ];        
        
        if ($this->request->is('post')) {
            $edata = $this->request->data;   
            $is_with_null = false;
            foreach( $edata as $key => $value ){
                if( trim($value) == '' ){
                    $is_with_null = true;
                }
            }       

            if( !$is_with_null ){
                //$recipient = "info@broproweb.com";        
                $recipient = "works.bryan.bio@gmail.com";     
                $email_smtp = new Email('default');
                $email_smtp->from(['broprowebsystem@gmail.com' => 'WebSystem'])
                    ->template('signup_newsletter')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('BroProWeb : Signup Newsletter')
                    ->viewVars(['edata' => $edata])
                    ->send();
            }else{
                $json_data = [
                    "is_success" => false,
                    'message' => '<div class="label label-danger fade in">Please fill up the form!</div>'
                ];
            }
        }else{
            $json_data = [
                "is_success" => false,
                'message' => '<div class="label label-danger fade in">Please fill up the form!</div>'
            ];   
        }

        echo json_encode($json_data);
        $this->viewBuilder()->layout('');
        exit;  
    }

    /**
     * Contact Us method        
     */
    public function contact_us() {     
        $this->viewBuilder()->layout("main_no_slider");         
        $this->set(['page_title' => "Contact Us"]);        
    }

    /**
     * updatePublish method     
     *
     */
    public function updatePublish() 
    {
        $this->viewBuilder()->layout('');     

        $id   = $this->request->data['id'];        
        $page = $this->Pages->get($id);
        if($page->is_publish == 1) {
            $page->is_publish = 0;
            $message = __("Unpublish");
        }else{
            $page->is_publish = 1;
            $message = __("Publish");
        }

        // Update is_publish
        if ($this->Pages->save($page)) {
            $return['message'] = __('You have successfully set as ').$message;
        } else {
            $return['message'] = __('Unable to update publish.');
        }

        echo json_encode($return);
        exit;
    }

    /**
     * Frontend : Search method
     *
     * @return void
     */
    public function search()
    {   

        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        $this->Shipments = TableRegistry::get('Shipments');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pages = array();
        if ($this->request->is('post')) {
            $data  = $this->request->data;
            $pages = $this->Pages->find('all')
                ->where(['Pages.body LIKE' => '%' . $data['query'] . '%'])
            ; 

            if(isset($user_data)){
                if( $user_data->user->group_id == 4 ){  
                    $shipments = $this->Shipments->find('all')
                        ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
                        ->where(['Shipments.client_id' => $user_data->id ,'Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                    ;

                    $inventory_order = $this->InventoryOrder->find('all')
                        ->contain(['Shipments', 'Clients'])
                        ->where(['Shipments.client_id' => $user_data->id ,'Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                        ->orWhere(['InventoryOrder.order_number LIKE' => '%' . $data['query'] . '%'])
                        ->order(['Shipments.id' => 'DESC'])
                    ;
                }else{
                    $shipments = $this->Shipments->find('all')
                        ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
                        ->where(['Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                    ;

                    $inventory_order = $this->InventoryOrder->find('all')
                        ->contain(['Shipments', 'Clients'])
                        ->where(['Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                        ->orWhere(['InventoryOrder.order_number LIKE' => '%' . $data['query'] . '%'])
                        ->order(['Shipments.id' => 'DESC'])
                    ;

                }
            }    
        }    

        if(isset($user_data)){    
            $this->set(['pages' => $pages,
                        'shipments' => $shipments,
                        'inventory_order' => $inventory_order,
                        'user_data' => $user_data
            ]);
        }else{
            $this->set(['pages' => $pages]); 
        }

        $this->viewBuilder()->layout('frontend/default');  
    }

     /**
     * Frontend : Search method
     *
     * @return void
     */
    public function search_admin()
    {   
        $session = $this->request->session();    
        $user_data = $session->read('User.data');

        $this->Shipments = TableRegistry::get('Shipments');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $pages = array();
        if ($this->request->is('post')) {
            $data  = $this->request->data;
            $pages = $this->Pages->find('all')
                ->where(['Pages.body LIKE' => '%' . $data['query'] . '%'])
            ; 

            if( $user_data->user->group_id == 4 ){   

                $shipments = $this->Shipments->find('all')
                    ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
                    ->where(['Shipments.client_id' => $user_data->id ,'Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                ;

                $inventory_order = $this->InventoryOrder->find('all')
                    ->contain(['Shipments', 'Clients'])
                    ->where(['Shipments.client_id' => $user_data->id, 'Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                    ->orWhere(['InventoryOrder.order_number LIKE' => '%' . $data['query'] . '%'])
                    ->order(['Shipments.id' => 'DESC'])
                ;

             }else{
                 $shipments = $this->Shipments->find('all')
                    ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
                    ->where(['Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                ;

                $inventory_order = $this->InventoryOrder->find('all')
                    ->contain(['Shipments', 'Clients'])
                    ->where(['Shipments.item_description LIKE' => '%' . $data['query'] . '%'])
                    ->orWhere(['InventoryOrder.order_number LIKE' => '%' . $data['query'] . '%'])
                    ->order(['Shipments.id' => 'DESC'])
                ;

             }   
        }     

        $this->set(['pages' => $pages,
                    'shipments' => $shipments,
                    'inventory_order' => $inventory_order
        ]);
 
    }
}
