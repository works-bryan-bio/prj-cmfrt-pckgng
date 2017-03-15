<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MessageDetails Controller
 *
 * @property \App\Model\Table\MessageDetailsTable $MessageDetails */
class MessageDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MessageHeaders', 'Users']
        ];
        $this->set('messageDetails', $this->paginate($this->MessageDetails));
        $this->set('_serialize', ['messageDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Message Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageDetail = $this->MessageDetails->get($id, [
            'contain' => ['MessageHeaders', 'Users']
        ]);
        $this->set('messageDetail', $messageDetail);
        $this->set('_serialize', ['messageDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messageDetail = $this->MessageDetails->newEntity();
        if ($this->request->is('post')) {
            $messageDetail = $this->MessageDetails->patchEntity($messageDetail, $this->request->data);
            if ($this->MessageDetails->save($messageDetail)) {
                $this->Flash->success(__('The message detail has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The message detail could not be saved. Please, try again.'));
            }
        }
        $messageHeaders = $this->MessageDetails->MessageHeaders->find('list', ['limit' => 200]);
        $users = $this->MessageDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageDetail', 'messageHeaders', 'users'));
        $this->set('_serialize', ['messageDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messageDetail = $this->MessageDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messageDetail = $this->MessageDetails->patchEntity($messageDetail, $this->request->data);
            if ($this->MessageDetails->save($messageDetail)) {
                $this->Flash->success(__('The message detail has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The message detail could not be saved. Please, try again.'));
            }
        }
        $messageHeaders = $this->MessageDetails->MessageHeaders->find('list', ['limit' => 200]);
        $users = $this->MessageDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageDetail', 'messageHeaders', 'users'));
        $this->set('_serialize', ['messageDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messageDetail = $this->MessageDetails->get($id);
        if ($this->MessageDetails->delete($messageDetail)) {
            $this->Flash->success(__('The message detail has been deleted.'));
        } else {
            $this->Flash->error(__('The message detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
