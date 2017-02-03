<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * ShippingCarriers Controller
 *
 * @property \App\Model\Table\ShippingCarriersTable $ShippingCarriers */
class ShippingCarriersController extends AppController
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
        $nav_selected = ["shipping_carriers"];
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
        $this->set('shippingCarriers', $this->paginate($this->ShippingCarriers));
        $this->set('_serialize', ['shippingCarriers']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipping Carrier id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shippingCarrier = $this->ShippingCarriers->get($id, [
            'contain' => ['Shipments']
        ]);
        $this->set('shippingCarrier', $shippingCarrier);
        $this->set('_serialize', ['shippingCarrier']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shippingCarrier = $this->ShippingCarriers->newEntity();
        if ($this->request->is('post')) {
            $shippingCarrier = $this->ShippingCarriers->patchEntity($shippingCarrier, $this->request->data);
            if ($this->ShippingCarriers->save($shippingCarrier)) {
                $this->Flash->success(__('The shipping carrier has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The shipping carrier could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingCarrier'));
        $this->set('_serialize', ['shippingCarrier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipping Carrier id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shippingCarrier = $this->ShippingCarriers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shippingCarrier = $this->ShippingCarriers->patchEntity($shippingCarrier, $this->request->data);
            if ($this->ShippingCarriers->save($shippingCarrier)) {
                $this->Flash->success(__('The shipping carrier has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipping carrier could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingCarrier'));
        $this->set('_serialize', ['shippingCarrier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipping Carrier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shippingCarrier = $this->ShippingCarriers->get($id);
        if ($this->ShippingCarriers->delete($shippingCarrier)) {
            $this->Flash->success(__('The shipping carrier has been deleted.'));
        } else {
            $this->Flash->error(__('The shipping carrier could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
