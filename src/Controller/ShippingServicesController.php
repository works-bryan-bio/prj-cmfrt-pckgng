<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * ShippingServices Controller
 *
 * @property \App\Model\Table\ShippingServicesTable $ShippingServices */
class ShippingServicesController extends AppController
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
        $nav_selected = ["shipping_services"];
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
        $this->set('shippingServices', $this->paginate($this->ShippingServices));
        $this->set('_serialize', ['shippingServices']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipping Service id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shippingService = $this->ShippingServices->get($id, [
            'contain' => ['Shipments']
        ]);
        $this->set('shippingService', $shippingService);
        $this->set('_serialize', ['shippingService']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shippingService = $this->ShippingServices->newEntity();
        if ($this->request->is('post')) {
            $shippingService = $this->ShippingServices->patchEntity($shippingService, $this->request->data);
            if ($this->ShippingServices->save($shippingService)) {
                $this->Flash->success(__('The shipping service has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The shipping service could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingService'));
        $this->set('_serialize', ['shippingService']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipping Service id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shippingService = $this->ShippingServices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shippingService = $this->ShippingServices->patchEntity($shippingService, $this->request->data);
            if ($this->ShippingServices->save($shippingService)) {
                $this->Flash->success(__('The shipping service has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipping service could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingService'));
        $this->set('_serialize', ['shippingService']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipping Service id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shippingService = $this->ShippingServices->get($id);
        if ($this->ShippingServices->delete($shippingService)) {
            $this->Flash->success(__('The shipping service has been deleted.'));
        } else {
            $this->Flash->error(__('The shipping service could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
