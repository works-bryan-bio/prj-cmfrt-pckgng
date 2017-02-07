<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Shipments Controller
 *
 * @property \App\Model\Table\ShipmentsTable $Shipments */
class ShipmentsController extends AppController
{
    /**
     * Initialize method     
     *
     */
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
        $nav_selected = ["shipments"];
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
        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 1])
            ->orWhere(['Shipments.status' => 4])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $receivedAndStoredShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 3])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith', 'Clients'])
            ->where(['Shipments.status' => 2])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $subShipments = array();
        foreach($pendingShipments as $shipment) {
            $client_id = $shipment->client_id;

            $subShipments[$shipment->id] = $this->Shipments->find('all')->where(['Shipments.client_id' => $client_id])->toArray();
        }

        $this->set(['subShipments' => $subShipments]);
        $this->set('pendingShipments', $this->paginate($pendingShipments));
        $this->set('completedShipments', $this->paginate($completedShipments));
        $this->set('receivedAndStoredShipments', $this->paginate($receivedAndStoredShipments));
        $this->set('_serialize', ['shipments']);
    }

    /**
     * Client method
     *
     * @return void
     */
    public function client()
    {
        $session = $this->request->session();    
        $user_data = $session->read('User.data');                 

        $pendingShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith'])
            ->where(['Shipments.client_id' => $user_data->id])
            ->andWhere(['Shipments.status' => 1 ." AND Shipments.status =4"])
            ->order(['Shipments.id' => 'DESC'])
        ;

        // $receivedAndStoredShipments = $this->Shipments->find('all')
        //     ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith'])
        //     ->where(['Shipments.client_id' => $user_data->id, 'Shipments.status' => 3])
        //     ->order(['Shipments.id' => 'DESC'])
        // ;

        $this->Inventory = TableRegistry::get('Inventory');
        $receivedAndStoredShipments = $this->Inventory->find('all')
            ->contain(['Shipments' => array('ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith') ])
            ->where(['Shipments.client_id' => $user_data->id, 'Shipments.status' => 3])
            ->order(['Shipments.id' => 'DESC'])
        ;

        // foreach($receivedAndStoredShipments as $receivedAndStoredShipments){
        //     debug($receivedAndStoredShipments);
        //     exit;

        // }



        $completedShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith'])
            ->where(['Shipments.client_id' => $user_data->id, 'Shipments.status' => 2])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $allShipments = $this->Shipments->find('all')
            ->contain(['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith'])
            ->where(['Shipments.client_id' => $user_data->id])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $this->set('pendingShipments', $this->paginate($pendingShipments));
        $this->set('completedShipments', $this->paginate($completedShipments));
        $this->set('allShipments', $this->paginate($allShipments));
        $this->set('receivedAndStoredShipments', $this->paginate($receivedAndStoredShipments));
        $this->set('_serialize', ['shipments']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => ['ShippingCarriers', 'ShippingServices']
        ]);
        $this->set('shipment', $shipment);
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Client View method
     *
     * @param string|null $id Shipment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function client_view($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => ['ShippingCarriers', 'ShippingServices', 'ShippingPurposes', 'CombineWith']
        ]);

        $session = $this->request->session();    
        $user_data = $session->read('User.data');     
        $group_id  = $user_data->user->group_id;
        $this->set(['group_id' => $group_id]); 
        $this->set('shipment', $shipment);
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipment = $this->Shipments->newEntity();
        if ($this->request->is('post')) {
            $shipment = $this->Shipments->patchEntity($shipment, $this->request->data);
            if ($this->Shipments->save($shipment)) {
                $this->Flash->success(__('The shipment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
            }
        }
        $shippingCarriers = $this->Shipments->ShippingCarriers->find('list');
        $shippingServices = $this->Shipments->ShippingServices->find('list');
        $clients = $this->Shipments->Clients->find('all');
        $optionClients = array();
        foreach( $clients as $c ){
            $optionClients[$c->id] = $c->firstname . " " . $c->lastname;
        }
        $optionStatus = [1 => 'Pending', 2 => 'Completed'];
        $this->set(compact('shipment', 'shippingCarriers', 'shippingServices', 'optionClients', 'optionStatus'));
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function client_add()
    {
        $shipment = $this->Shipments->newEntity();

        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 

        if ($this->request->is('post')) {            

            $this->request->data['client_id'] = $user_data->id;
            $this->request->data['status']    = 1;
            
            if( $this->request->data['shipping_carrier_id'] != 4 ){
                $this->request->data['other_shipping_carrier'] = "";
            }

            if( $this->request->data['shipping_purpose_id'] == 3 ){                
                $this->request->data['combine_with_id'] = 0;
                $this->request->data['combine_comment'] = "";
            }elseif( $this->request->data['shipping_purpose_id'] == 5 ){
                $this->request->data['send_amazon_qty'] = 0;                
            }else{
                $this->request->data['send_amazon_qty'] = "";
                $this->request->data['combine_with_id'] = 0;
                $this->request->data['combine_comment'] = "";
            }

            if( $this->request->data['shipping_service_id'] != 4 ){
                $this->request->data['other_shipping_service'] = "";
            }

            $shipment = $this->Shipments->patchEntity($shipment, $this->request->data);
            if ($result = $this->Shipments->save($shipment)) {
                
                $email_content = ['shipment_details' => $this->request->data, 'client' => $user_data, 'shipment_id' => $result->id];



                $recipient = "comfortapplication@gmail.com";        
                $email_smtp = new Email('default');
                $email_smtp->from(['comfortapplication@gmail.com' => 'WebSystem'])
                    ->template('shipment')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('Comfort Packaging : Shipment Add')
                    ->viewVars(['edata' => $email_content])
                    ->send();    

                $this->Flash->success(__('The shipment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'client']);
                }else{
                    return $this->redirect(['action' => 'client_add']);
                }                    
            } else {
                $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
            }
        }
        $shippingCarriers = $this->Shipments->ShippingCarriers->find('list');
        $shippingServices = $this->Shipments->ShippingServices->find('list');
        $shippingPurposes = $this->Shipments->shippingPurposes->find('list');        
        $pendingShipments = $this->Shipments->find('all')
            ->where(['Shipments.client_id' => $user_data->id , 'Shipments.status' => 1 ]) 
            ->orWhere(['Shipments.status' => 3])
            ->order(['Shipments.id' => 'DESC'])
        ;

        // debug($pendingShipments);
        // exit;

        $optionPendingShipments = array();
        foreach( $pendingShipments as $ps ){
            $optionPendingShipments[$ps->id] = $ps->item_description;
        }
        $this->set(compact('shipment', 'shippingCarriers', 'shippingServices', 'shippingPurposes', 'optionPendingShipments'));
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipment = $this->Shipments->patchEntity($shipment, $this->request->data);
            if ($this->Shipments->save($shipment)) {
                $this->Flash->success(__('The shipment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
            }
        }
        $shippingCarriers = $this->Shipments->ShippingCarriers->find('list');
        $shippingServices = $this->Shipments->ShippingServices->find('list');
        $clients = $this->Shipments->Clients->find('all');
        $optionClients = array();
        foreach( $clients as $c ){
            $optionClients[$c->id] = $c->firstname . " " . $c->lastname;
        }
        $optionStatus = [1 => 'Pending', 2 => 'Completed'];
        $this->set(compact('shipment', 'shippingCarriers', 'shippingServices', 'optionClients', 'optionStatus'));
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Client Edit method
     *
     * @param string|null $id Shipment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function client_edit($id = null)
    {
        $shipment = $this->Shipments->get($id, [
            'contain' => []
        ]);

        if( $shipment->status == 2 ){
            $this->Flash->error(__('Cannot edit completed shipment!'));    
            return $this->redirect(['action' => 'client']);
        }

        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if( $this->request->data['shipping_carrier_id'] != 4 ){
                $this->request->data['other_shipping_carrier'] = "";
            }

            if( $this->request->data['shipping_purpose_id'] == 3 ){                
                $this->request->data['combine_with_id'] = 0;
                $this->request->data['combine_comment'] = "";
            }elseif( $this->request->data['shipping_purpose_id'] == 5 ){
                $this->request->data['send_amazon_qty'] = 0;                
            }else{
                $this->request->data['send_amazon_qty'] = "";
                $this->request->data['combine_with_id'] = 0;
                $this->request->data['combine_comment'] = "";
            }

            if( $this->request->data['shipping_service_id'] != 4 ){
                $this->request->data['other_shipping_service'] = "";
            }

            $shipment = $this->Shipments->patchEntity($shipment, $this->request->data);
            if ($this->Shipments->save($shipment)) {
                $this->Flash->success(__('The shipment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'client']);
                }else{
                    return $this->redirect(['action' => 'client_edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
            }
        }
        $shippingCarriers = $this->Shipments->ShippingCarriers->find('list');
        $shippingServices = $this->Shipments->ShippingServices->find('list');
        $shippingPurposes = $this->Shipments->shippingPurposes->find('list');        
        $pendingShipments = $this->Shipments->find('all')
            ->where(['Shipments.status' => 1, 'Shipments.client_id' => $user_data->id])
        ;

        $optionPendingShipments = array();
        foreach( $pendingShipments as $ps ){
            $optionPendingShipments[$ps->id] = $ps->item_description;
        }
        $this->set(compact('shipment', 'shippingCarriers', 'shippingServices', 'shippingPurposes', 'optionPendingShipments'));
        $this->set('_serialize', ['shipment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipment = $this->Shipments->get($id);
        if ($this->Shipments->delete($shipment)) {
            $this->Flash->success(__('The shipment has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function send_to_received_and_stored()
    {
        $this->Inventory = TableRegistry::get('Inventory');
        $this->request->allowMethod(['post']);

        $session = $this->request->session();    
        $user_data = $session->read('User.data');

        $data = $this->request->data;
        $shipment = $this->Shipments->get($data['shipment_id']);
       
        if (!empty($shipment)) {
            $this->Flash->success(__('Shipment has been successfully sent to inventory.'));  
            $shipment = $this->Shipments->patchEntity($shipment, $data);
            if($data['send_option'] == "send_to_amazon"){
                $shipment->status = 4;
            }else{
                $shipment->status = 3;
            }

            $remaining_quantity = $shipment->quantity;

            if(!empty($data['quantity_to_send']) && $data['send_option'] == 'send_part_of_it_to_amazon'){
                $shipment->send_amazon_qty = $data['quantity_to_send'];
                $remaining_quantity = $remaining_quantity - $data['quantity_to_send'];
            }

            if(empty($data['amazon_confirmation_receipt'])){
                $data['amazon_confirmation_receipt'] = 0;
            }

            if(!empty($data['amazon_shipment_date']) && $data['amazon_confirmation_receipt'] == 1 && $data['send_option'] == "send_to_amazon" ){
                $shipment->status = 2;
                $remaining_quantity = 0;
            }

            if($data['send_option'] == 'combine_with_shipment') {
                $shipment->status = 2;
                $shipment->combine_comment = 'Combined with Shipment '.$data['combine_with_id'];

                $combine_shipment = $this->Shipments->get($data['combine_with_id']);

                if($combine_shipment) {
                    /*$combine_shipment->quantity += $shipment->quantity;*/ 
                    $this->Shipments->save($combine_shipment);
                    $shipment->status = $combine_shipment->status;
                }

                $combine_inventory = $this->Inventory->find('all')
                    ->where([ 'Inventory.shipment_id' => $data['combine_with_id']])
                    ->first();

                if($combine_inventory){
                    /*$combine_inventory->sent_quantity += $shipment->quantity; 
                    $combine_inventory->remaining_quantity += $remaining_quantity;*/ 
                    $this->Inventory->save($combine_inventory);
                }
                    
            }

            if($data['is_correct_quantity'] == 1) {
                $data['correct_quantity_comment'] = "";
            }
            
            $shipment->is_sent_to_inventory = 1;
            $this->Shipments->save($shipment);

            if($data['send_option'] != 'combine_with_shipment') {
                $inventory = $this->Inventory->find('all')
                    ->where([ 'Inventory.shipment_id' => $shipment->id])
                    ->first();
                if(!$inventory){
                    $inventory = $this->Inventory->newEntity();
                }
                
                $inventory_data['client_id'] = $shipment->client_id;
                $inventory_data['shipment_id'] = $shipment->id;
                $inventory_data['sent_quantity'] = $shipment->quantity;
                $inventory_data['remaining_quantity'] = $remaining_quantity;
                $inventory = $this->Inventory->patchEntity($inventory, $inventory_data);
                $this->Inventory->save($inventory);
            }

            $email_content = ['shipment_details' => $shipment->item_description, 'comment' => $data['correct_quantity_comment']  , 'client' => $user_data, 'shipment_id' => $shipment->id];

                $recipient = "comfortapplication@gmail.com";        
                $email_smtp = new Email('default');
                $email_smtp->from(['comfortapplication@gmail.com' => 'WebSystem'])
                    ->template('employee_received')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('Comfort Packaging : Shipment received')
                    ->viewVars(['edata' => $email_content])
                    ->send();  
        } else {
            $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
        }

        
        if($user_data->id == 4) {
            return $this->redirect(['action' => 'client']);
        }else{
            return $this->redirect(['action' => 'index']);
        }
        
    }

    public function send_to_inventory($shipment_id)
    {
        $this->request->allowMethod(['post']);
        $shipment = $this->Shipments->get($shipment_id);

        $session = $this->request->session();    
        $user_data = $session->read('User.data'); 

        $this->Inventory = TableRegistry::get('Inventory');
        $inventory = $this->Inventory->newEntity();
        $data['client_id'] = $user_data->id;
        $data['shipment_id'] = $shipment_id;
        $data['sent_quantity'] = $shipment->quantity;
        $data['remaining_quantity'] = $shipment->quantity;
        $inventory = $this->Inventory->patchEntity($inventory, $data);
        if ($this->Inventory->save($inventory)) {
            $this->Flash->success(__('Shipment has been successfully sent to inventory.'));  

            $shipment->is_sent_to_inventory = 1;
            $this->Shipments->save($shipment);

        } else {
            $this->Flash->error(__('The shipment could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'client']);
    }
}
