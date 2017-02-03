<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * InventoryOrder Controller
 *
 * @property \App\Model\Table\InventoryOrderTable $InventoryOrder */
class InventoryOrderController extends AppController
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
    public function index($shipment_id = null, $inventory_id = null)
    {
        if($shipment_id == null) {
            return $this->redirect(['controller' => 'inventory', 'action' => 'index']);
        }

        $InventoryOrder = $this->InventoryOrder->find('all')
            ->contain(['Clients', 'Shipments', 'ShippingCarriers', 'ShippingServices'])
            ->where(['InventoryOrder.shipment_id' => $shipment_id , 'InventoryOrder.order_status' => 'Pending'])
            ->order(['InventoryOrder.id' => 'DESC'])
        ;

        $inventoryOrderCompleted = $this->InventoryOrder->find('all')
            ->contain(['Clients', 'Shipments', 'ShippingCarriers', 'ShippingServices'])
            ->where(['InventoryOrder.shipment_id' => $shipment_id , 'InventoryOrder.order_status' => 'Completed'])
            ->order(['InventoryOrder.id' => 'DESC'])
        ;

        $inventory = array();
        $this->Inventory = TableRegistry::get('Inventory');
        if($inventory_id != null) {
            $inventory = $this->Inventory->get($inventory_id);
        }

        $session = $this->request->session();    
        $user_data = $session->read('User.data');
        $group_id  = $user_data->user->group_id;
        $this->set(['inventory' => $inventory, 'group_id' => $group_id]);
        $this->set('inventoryOrder', $this->paginate($InventoryOrder));
        $this->set('inventoryOrderCompleted', $this->paginate($inventoryOrderCompleted));
        $this->set('_serialize', ['inventoryOrder']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventory Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventoryOrder = $this->InventoryOrder->get($id, [
            'contain' => ['Clients', 'Shipments', 'ShippingCarriers', 'ShippingServices']
        ]);
        $this->set('inventoryOrder', $inventoryOrder);
        $this->set('_serialize', ['inventoryOrder']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($shipment_id = null)
    {
    
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $remaining_quantity = "";
        if($shipment_id) {
            $this->Inventory = TableRegistry::get('Inventory'); 
            $inventory = $this->Inventory->find('all')
                ->contain(['Shipments'])
                ->where(['Inventory.shipment_id' => $shipment_id ])
                ->order(['Shipments.id' => 'DESC'])
            ;

             foreach ($inventory as $inventory){
                    $remaining_quantity = $inventory->remaining_quantity;

             }    
        }else{
            $shipment_id = $this->request->data['shipment_id'];
        }
             

        if ($this->request->is('post')) {
            $session = $this->request->session();    
            $user_data = $session->read('User.data');
            $this->request->data['client_id'] = $user_data->id;
            $this->request->data['shipment_id'] = $shipment_id;
            $this->request->data['order_status'] = "Pending";

            $inventoryOrder = $this->InventoryOrder->patchEntity($inventoryOrder, $this->request->data);
            if ($result = $this->InventoryOrder->save($inventoryOrder)) {
                $this->Flash->success(__('The inventory order has been saved.'));
                
                 $email_content = ['client' => $user_data, 'shipment_id' => $shipment_id, 'order_id' => $result->id];

                
                $recipient = "comfortapplication@gmail.com";        
                $email_smtp = new Email('default');
                $email_smtp->from(['comfortapplication@gmail.com' => 'WebSystem'])
                    ->template('order')
                    ->emailFormat('html')
                    ->to($recipient)                                                                                                     
                    ->subject('Comfort Packaging : Shipment Add order')
                    ->viewVars(['edata' => $email_content])
                    ->send();  

                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index/'.$shipment_id]);
                }else{
                    return $this->redirect(['action' => 'add/'.$shipment_id]);
                }                    
            } else {
                $this->Flash->error(__('The inventory order could not be saved. Please, try again.'));
            }
        }

        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));
        $this->set('remaining_quantity' , $remaining_quantity);
        $this->set('_serialize', ['inventoryOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventoryOrder = $this->InventoryOrder->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventoryOrder = $this->InventoryOrder->patchEntity($inventoryOrder, $this->request->data);
            if ($this->InventoryOrder->save($inventoryOrder)) {
                $this->Flash->success(__('The inventory order has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The inventory order could not be saved. Please, try again.'));
            }
        }
        $clients = $this->InventoryOrder->Clients->find('list', ['limit' => 200]);
        $shipments = $this->InventoryOrder->Shipments->find('list', ['limit' => 200]);
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->InventoryOrders->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'clients', 'shipments', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));
        $this->set('_serialize', ['inventoryOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventoryOrder = $this->InventoryOrder->get($id);
        if ($this->InventoryOrder->delete($inventoryOrder)) {
            $this->Flash->success(__('The inventory order has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function update_status_to_complete($inventory_order_id = null, $inventory_id = null)
    {
        $this->request->allowMethod(['post']);
        $inventory_order = $this->InventoryOrder->get($inventory_order_id);
       
        if (!empty($inventory_order)) {
            $this->Flash->success(__('Inventory order has been successfully updated the status.'));  

            $inventory_order->order_status = "Completed";
            $this->InventoryOrder->save($inventory_order);

            $this->Inventory = TableRegistry::get('Inventory');
            if($inventory_id != null) {
                $inventory = $this->Inventory->get($inventory_id);
                $remaining_quantity = $inventory->remaining_quantity - $inventory_order->order_quantity;
                if($remaining_quantity < 0) {
                    $remaining_quantity = 0;
                }
                $inventory->remaining_quantity = $remaining_quantity;
                $inventory->last_sent_order_date = date("Y-m-d H:i:s");
                $inventory->last_sent_order_quantity = $inventory_order->order_quantity;
                $inventory->last_sent_destination = $inventory_order->order_destination;                               
                $this->Inventory->save($inventory);                
                
                if($remaining_quantity <= 0) {
                    $shipment_id = $inventory->shipment_id;
                    $this->Shipments = TableRegistry::get('Shipments');
                    $shipment = $this->Shipments->get($shipment_id);
                    $shipment->status = 2;
                    $this->Shipments->save($shipment);

                }
            }

        } else {
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }
        return $this->redirect(['controller' => 'inventory', 'action' => 'admin']);
    }
}
