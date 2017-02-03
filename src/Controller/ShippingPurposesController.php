<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


/**
 * ShippingPurposes Controller
 *
 * @property \App\Model\Table\ShippingPurposesTable $ShippingPurposes */
class ShippingPurposesController extends AppController
{
    /**
     * Initialize method     
     *
     */
    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["shipping_purposes"];
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
        $this->set('shippingPurposes', $this->paginate($this->ShippingPurposes));
        $this->set('_serialize', ['shippingPurposes']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipping Purpose id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shippingPurpose = $this->ShippingPurposes->get($id, [
            'contain' => []
        ]);
        $this->set('shippingPurpose', $shippingPurpose);
        $this->set('_serialize', ['shippingPurpose']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shippingPurpose = $this->ShippingPurposes->newEntity();
        if ($this->request->is('post')) {
            $shippingPurpose = $this->ShippingPurposes->patchEntity($shippingPurpose, $this->request->data);
            if ($this->ShippingPurposes->save($shippingPurpose)) {
                $this->Flash->success(__('The shipping purpose has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The shipping purpose could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingPurpose'));
        $this->set('_serialize', ['shippingPurpose']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipping Purpose id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shippingPurpose = $this->ShippingPurposes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shippingPurpose = $this->ShippingPurposes->patchEntity($shippingPurpose, $this->request->data);
            if ($this->ShippingPurposes->save($shippingPurpose)) {
                $this->Flash->success(__('The shipping purpose has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipping purpose could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingPurpose'));
        $this->set('_serialize', ['shippingPurpose']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipping Purpose id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shippingPurpose = $this->ShippingPurposes->get($id);
        if ($this->ShippingPurposes->delete($shippingPurpose)) {
            $this->Flash->success(__('The shipping purpose has been deleted.'));
        } else {
            $this->Flash->error(__('The shipping purpose could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
