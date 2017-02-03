<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EndUserOrder Controller
 *
 * @property \App\Model\Table\EndUserOrderTable $EndUserOrder */
class EndUserOrderController extends AppController
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
        $nav_selected = ["end_user_order"];
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
            'contain' => ['Clients', 'ShippingServices']
        ];
        $this->set('endUserOrder', $this->paginate($this->EndUserOrder));
        $this->set('_serialize', ['endUserOrder']);
    }

    /**
     * View method
     *
     * @param string|null $id End User Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $endUserOrder = $this->EndUserOrder->get($id, [
            'contain' => ['Clients', 'ShippingServices']
        ]);
        $this->set('endUserOrder', $endUserOrder);
        $this->set('_serialize', ['endUserOrder']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {    $session = $this->request->session();    
        $user_data = $session->read('User.data');     
        echo $user_data->id;
        $endUserOrder = $this->EndUserOrder->newEntity();
        if ($this->request->is('post')) {
            $endUserOrder = $this->EndUserOrder->patchEntity($endUserOrder, $this->request->data);

               $this->request->data['client_id'] = $user_data->id;

            if ($this->EndUserOrder->save($endUserOrder)) {
                $this->Flash->success(__('The end user order has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The end user order could not be saved. Please, try again.'));
            }
        }
        $clients = $this->EndUserOrder->Clients->find('list', ['limit' => 200]);
        $shippingServices = $this->EndUserOrder->ShippingServices->find('list', ['limit' => 200]);
        $this->set(compact('endUserOrder', 'clients', 'shippingServices'));
        $this->set('client_id', $user_data->id);
        $this->set('group_id', $user_data->user->group_id);
        $this->set('_serialize', ['endUserOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id End User Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $endUserOrder = $this->EndUserOrder->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endUserOrder = $this->EndUserOrder->patchEntity($endUserOrder, $this->request->data);
            if ($this->EndUserOrder->save($endUserOrder)) {
                $this->Flash->success(__('The end user order has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The end user order could not be saved. Please, try again.'));
            }
        }
        $clients = $this->EndUserOrder->Clients->find('list', ['limit' => 200]);
        $shippingServices = $this->EndUserOrder->ShippingServices->find('list', ['limit' => 200]);
        $this->set(compact('endUserOrder', 'clients', 'shippingServices'));
        $this->set('_serialize', ['endUserOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id End User Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endUserOrder = $this->EndUserOrder->get($id);
        if ($this->EndUserOrder->delete($endUserOrder)) {
            $this->Flash->success(__('The end user order has been deleted.'));
        } else {
            $this->Flash->error(__('The end user order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
