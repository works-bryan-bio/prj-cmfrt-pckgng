<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShipmentStatus Controller
 *
 * @property \App\Model\Table\ShipmentStatusTable $ShipmentStatus */
class ShipmentStatusController extends AppController
{

    /**
     * Initialize method     
     *
     */
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow();

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('shipmentStatus', $this->paginate($this->ShipmentStatus));
        $this->set('_serialize', ['shipmentStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Shipment Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipmentStatus = $this->ShipmentStatus->get($id, [
            'contain' => []
        ]);
        $this->set('shipmentStatus', $shipmentStatus);
        $this->set('_serialize', ['shipmentStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipmentStatus = $this->ShipmentStatus->newEntity();
        if ($this->request->is('post')) {
            $shipmentStatus = $this->ShipmentStatus->patchEntity($shipmentStatus, $this->request->data);
            if ($this->ShipmentStatus->save($shipmentStatus)) {
                $this->Flash->success(__('The shipment status has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The shipment status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shipmentStatus'));
        $this->set('_serialize', ['shipmentStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipment Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipmentStatus = $this->ShipmentStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipmentStatus = $this->ShipmentStatus->patchEntity($shipmentStatus, $this->request->data);
            if ($this->ShipmentStatus->save($shipmentStatus)) {
                $this->Flash->success(__('The shipment status has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The shipment status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shipmentStatus'));
        $this->set('_serialize', ['shipmentStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipment Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipmentStatus = $this->ShipmentStatus->get($id);
        if ($this->ShipmentStatus->delete($shipmentStatus)) {
            $this->Flash->success(__('The shipment status has been deleted.'));
        } else {
            $this->Flash->error(__('The shipment status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
