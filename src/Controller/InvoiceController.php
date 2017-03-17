<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoice Controller
 *
 * @property \App\Model\Table\InvoiceTable $Invoice */
class InvoiceController extends AppController
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
        $nav_selected = ["invoice"];
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

        $enable_export = false;
        if( $user_data->user->group_id == 2 || $user_data->user->group_id == 1 ){
            $enable_export = true;
        } 
        
        $invoiceList = $this->Invoice->find('all')
            ->contain(['Shipments', 'Clients'])
        ;        

        $this->set(['enable_export' => $enable_export]);
        $this->set('invoiceList', $invoiceList);
        $this->set('_serialize', ['invoice']);
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

        $pendingInvoice = $this->Invoice->find('all')
            ->contain(['Clients', 'Shipments'])
            ->where(['Invoice.clients_id' => $user_data->id, 'Invoice.status' => 1])
            ->order(['Invoice.id' => 'DESC'])
        ;

        // debug($pendingInvoice);
        // exit;

        $completedInvoice = $this->Invoice->find('all')
            ->contain(['Clients', 'Shipments'])
            ->where(['Invoice.clients_id' => $user_data->id, 'Invoice.status' => 2])
            ->order(['Invoice.id' => 'DESC'])
        ;
        
        $this->set('pendingInvoice', $pendingInvoice);
        $this->set('completedInvoice', $completedInvoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoice->get($id, [
            'contain' => ['Shipments', 'Clients', 'InvoiceDetails']
        ]);
        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * View Client method
     *
     * @param string|null $id Invoice id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view_client($id = null)
    {
        $invoice = $this->Invoice->get($id, [
            'contain' => ['Shipments', 'Clients', 'InvoiceDetails']
        ]);
        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoice->newEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoice->patchEntity($invoice, $this->request->data);
            if ($this->Invoice->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $shipments = $this->Invoice->Shipments->find('all'); //'list', ['limit' => 200]
        $optionShipments = array();
        foreach( $shipments as $s ){
            $optionShipments[$s->id] = $s->id ." - ". $s->item_description;
        }

        $clients = $this->Invoice->Clients->find('all');
        $optionClients = array();
        foreach( $clients as $c ){
            $optionClients[$c->id] = $c->firstname . " " . $c->lastname;
        }
        $this->set(compact('invoice', 'shipments', 'optionClients', 'optionShipments','clients'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoice->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoice->patchEntity($invoice, $this->request->data);
            if ($this->Invoice->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $shipments = $this->Invoice->Shipments->find('list', ['limit' => 200]);
        $clients = $this->Invoice->Clients->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'shipments', 'clients'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoice->get($id);
        if ($this->Invoice->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

     /**
     * Payment update method
     *
     * @param string|null $id Invoice id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function payment($id = null)
    {
        $invoice = $this->Invoice->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['status'] = 2;
            $this->request->data['date_completed'] = date('Y-m-d H:i:s');
            $invoice = $this->Invoice->patchEntity($invoice, $this->request->data);
            if ($this->Invoice->save($invoice)) {
               
                    return $this->redirect(['action' => 'client']);
               
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $shipments = $this->Invoice->Shipments->find('list', ['limit' => 200]);
        $clients = $this->Invoice->Clients->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'shipments', 'clients'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Export to excel method
     *
     * @return download excel
     */
    public function export_to_excel()
    {
        $invoiceList = $this->Invoice->find('all')
            ->contain(['Shipments', 'Clients'])
        ;        
        
        $this->set('invoiceList', $invoiceList);
        $this->set('_serialize', ['invoice']);
        $this->viewBuilder()->layout('');  
    }

}
