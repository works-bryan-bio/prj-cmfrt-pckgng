<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory */
class InventoryController extends AppController
{

     /**
     * Initialize method     
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
                $this->Auth->allow(['index','add']);
            }elseif( $user_data->user->group_id == 3 ){ //Employee
                $this->Auth->allow(['employee','add']);
            }elseif( $user_data->user->group_id == 4 ){ //Client
                $this->Auth->allow(['client', 'client_add', 'client_edit', 'client_view']);
            }  
        }
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["inventory"];
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
        $user_data = $session->read('User.data');  
        $this->Shipments = TableRegistry::get('Shipments');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder'); 
        
        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.client_id' => $user_data->id ,'InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

       
        $inventory = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.client_id' => $user_data->id , 'Inventory.remaining_quantity <>' => '> 0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventoryCompleted = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.client_id' => $user_data->id , 'Inventory.remaining_quantity' => '0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('group_id' , $user_data->user->group_id);
        $this->set('inventory_order', $inventory_order);
        $this->set('inventory', $inventory);
        $this->set('inventoryCompleted', $inventoryCompleted);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Admin method
     *
     * @return void
     */
//    public function admin()
//    {
//        $session = $this->request->session();
//        $user_data = $session->read('User.data');
//
//        $inventory = $this->Inventory->find('all')
//            ->contain(['Shipments', 'Clients'])
//            ->where(['Inventory.remaining_quantity <>' => '> 0'])
//            ->order(['Shipments.id' => 'DESC'])
//        ;
//
//        $inventory_completed = $this->Inventory->find('all')
//            ->contain(['Shipments', 'Clients'])
//            ->where(['Inventory.remaining_quantity' => '0'])
//            ->order(['Shipments.id' => 'DESC'])
//        ;
//
//        $this->InventoryOrder = TableRegistry::get('InventoryOrder');
//        $inventoryOrder = $this->InventoryOrder->newEntity();
//        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
//        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
//        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
//        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));
//
//        $this->set('group_id' , $user_data->user->group_id);
//        $this->set('inventory', $inventory);
//        $this->set('inventory_completed', $inventory_completed);
//        $this->set('_serialize', ['inventory']);
//    }

    public function admin()
    {
        $session = $this->request->session();
        $user_data = $session->read('User.data');
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventory = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.remaining_quantity <>' => '> 0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventory_completed = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.remaining_quantity' => '0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $cancelled_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Cancelled'])
            ->order(['Shipments.id' => 'DESC'])
        ;


        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('group_id' , $user_data->user->group_id);
        $this->set('cancelled_order', $cancelled_order);
        $this->set('inventory_order', $inventory_order);
        $this->set('inventory', $inventory);
        $this->set('inventory_completed', $inventory_completed);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Employee method
     *
     * @return void
     */
    public function employee()
    {
        $session = $this->request->session();    
        $user_data = $session->read('User.data');  
        $this->InventoryOrder = TableRegistry::get('InventoryOrder');

        $inventory_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Pending'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventory = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.remaining_quantity <>' => '> 0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $inventory_completed = $this->Inventory->find('all')
            ->contain(['Shipments'])
            ->where(['Inventory.remaining_quantity' => '0'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        $cancelled_order = $this->InventoryOrder->find('all')
            ->contain(['Shipments', 'Clients'])
            ->where(['InventoryOrder.order_status' => 'Cancelled'])
            ->order(['Shipments.id' => 'DESC'])
        ;

        
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('group_id' , $user_data->user->group_id);
        $this->set('cancelled_order', $cancelled_order);
        $this->set('inventory_order', $inventory_order);
        $this->set('inventory', $inventory);
        $this->set('inventory_completed', $inventory_completed);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => ['Shipments', 'Clients']
        ]);

        $session = $this->request->session();    
        $user_data = $session->read('User.data');    
        $group_id  = $user_data->user->group_id;
            

        $this->set(['group_id' => $group_id]);
        $this->set('inventory', $inventory);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventory->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $shipments = $this->Inventory->Shipments->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'shipments'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $shipments = $this->Inventory->Shipments->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'shipments'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function save_bill_lading()
    {
        $data = $this->request->data;
        $this->request->allowMethod(['post']);
        $inventory = $this->Inventory->get($data['inventory_id']);
        $bill_lading = $inventory->bill_lading_details;

        if($bill_lading == "") {
            $a_bill_lading = array();
        }else{
            $a_bill_lading = unserialize($bill_lading);
        }

        if($data['edit_mode'] == "on"){
            unset($a_bill_lading[$data['old_bill_lading_file']]);
        }

        $a_bill_lading[$data['bill_lading_file']]['bill_lading_file'] = $data['bill_lading_file'];
        $a_bill_lading[$data['bill_lading_file']]['date_upload'] = $data['date_upload'];
        $a_bill_lading[$data['bill_lading_file']]['remarks'] = $data['remarks'];

        $inventory->bill_lading_details = serialize($a_bill_lading);
        if($this->Inventory->save($inventory)){
            $this->Flash->success(__('Bill lading has been saved.'));
        }else{
            $this->Flash->error(__('Unable to save bill lading. Please, try again.'));
        }
        return $this->redirect(['action' => 'employee']);

    }

    public function delete_bill_lading()
    {
        $id = $this->request->data['inventory_id'];
        $bill_lading_file = $this->request->data['bill_lading_file'];
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        $bill_lading = $inventory->bill_lading_details;

        if($bill_lading == "") {
            $a_bill_lading = array();
        }else{
            $a_bill_lading = unserialize($bill_lading);
        }

        if(!empty($a_bill_lading)){
            unset($a_bill_lading[$bill_lading_file]);
        }

        $inventory->bill_lading_details = serialize($a_bill_lading);
        if($this->Inventory->save($inventory)){
            $this->Flash->success(__('Bill lading has been removed.'));
        }else{
            $this->Flash->error(__('Unable to remove bill lading. Please, try again.'));
        }
        return $this->redirect(['action' => 'employee']);

    }

}
