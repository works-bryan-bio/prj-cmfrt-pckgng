<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvoiceDetails Controller
 *
 * @property \App\Model\Table\InvoiceDetailsTable $InvoiceDetails */
class InvoiceDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Invoices']
        ];
        $this->set('invoiceDetails', $this->paginate($this->InvoiceDetails));
        $this->set('_serialize', ['invoiceDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceDetail = $this->InvoiceDetails->get($id, [
            'contain' => ['Invoices']
        ]);
        $this->set('invoiceDetail', $invoiceDetail);
        $this->set('_serialize', ['invoiceDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceDetail = $this->InvoiceDetails->newEntity();
        if ($this->request->is('post')) {
            $invoiceDetail = $this->InvoiceDetails->patchEntity($invoiceDetail, $this->request->data);
            if ($this->InvoiceDetails->save($invoiceDetail)) {
                $this->Flash->success(__('The invoice detail has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The invoice detail could not be saved. Please, try again.'));
            }
        }
        $invoices = $this->InvoiceDetails->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('invoiceDetail', 'invoices'));
        $this->set('_serialize', ['invoiceDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceDetail = $this->InvoiceDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceDetail = $this->InvoiceDetails->patchEntity($invoiceDetail, $this->request->data);
            if ($this->InvoiceDetails->save($invoiceDetail)) {
                $this->Flash->success(__('The invoice detail has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The invoice detail could not be saved. Please, try again.'));
            }
        }
        $invoices = $this->InvoiceDetails->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('invoiceDetail', 'invoices'));
        $this->set('_serialize', ['invoiceDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceDetail = $this->InvoiceDetails->get($id);
        if ($this->InvoiceDetails->delete($invoiceDetail)) {
            $this->Flash->success(__('The invoice detail has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
