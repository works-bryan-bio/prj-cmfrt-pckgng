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

        $this->InventoryOrder = TableRegistry::get('InventoryOrder');
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('inventory', $this->paginate($inventory));
        $this->set('inventoryCompleted', $this->paginate($inventoryCompleted));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Admin method
     *
     * @return void
     */
    public function admin()
    {
        $session = $this->request->session();    
        $user_data = $session->read('User.data');  

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

        $this->InventoryOrder = TableRegistry::get('InventoryOrder');
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('group_id' , $user_data->user->group_id);
        $this->set('inventory', $this->paginate($inventory));
        $this->set('inventory_completed', $this->paginate($inventory_completed));
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

        $this->InventoryOrder = TableRegistry::get('InventoryOrder');
        $inventoryOrder = $this->InventoryOrder->newEntity();
        $shippingCarriers = $this->InventoryOrder->ShippingCarriers->find('list', ['limit' => 200]);
        $shippingServices = $this->InventoryOrder->ShippingServices->find('list', ['limit' => 200]);
        $inventoryOrders = $this->InventoryOrder->find('list', ['limit' => 200]);
        $this->set(compact('inventoryOrder', 'shippingCarriers', 'shippingServices', 'inventoryOrders'));

        $this->set('group_id' , $user_data->user->group_id);
        $this->set('inventory', $this->paginate($inventory));
        $this->set('inventory_completed', $this->paginate($inventory_completed));
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
            'contain' => ['Shipments']
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
}
