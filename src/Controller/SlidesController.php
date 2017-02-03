<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class SlidesController extends AppController
{

    public $helpers = ['NavigationSelector'];

    /**
     * Initialize method
     * ID : CA-01
     *
     */
    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["slides"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     * ID : CA-02
     * @return void
     */
    public function index()
    {
        $this->set('slides', $this->paginate($this->Slides));
        $this->set('_serialize', ['slides']);
    }

    /**
     * View method
     * ID : CA-03
     * @param string|null $id Slide id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slide = $this->Slides->get($id, [
            'contain' => []
        ]);
        $this->set('slide', $slide);
        $this->set('_serialize', ['slide']);
    }

    /**
     * Add method
     * ID : CA-04
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slide = $this->Slides->newEntity();

        // Get the highest sorting value
        $slide_obj = $this->Slides->find('all')->toArray();
        $collection = new Collection($slide_obj);
        $max_sort = $collection->max(function ($slide_obj) {
            return $slide_obj->sort;
        });
        if($max_sort) {
            // Assign next sorting value by adding 1
            $sorting = $max_sort->sorting + 1;
        }else{
            // Assign sorting value by default 1
            $sorting = 1;
        }

        if ($this->request->is('post')) {
            $this->request->data['is_publish'] = 1;
            $slide = $this->Slides->patchEntity($slide, $this->request->data);
            $slide->sorting = $sorting;
            $result = $this->Slides->save($slide);
            if ($result) {
                $this->Flash->success('The slide has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'add']);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
                
            } else {
                $this->Flash->error('The slide could not be saved. Please, try again.');
            }
        }
        $this->set(compact('slide'));
        $this->set('_serialize', ['slide']);
    }

    /**
     * Edit method
     * ID : CA-05
     * @param string|null $id Slide id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slide = $this->Slides->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slide = $this->Slides->patchEntity($slide, $this->request->data);
            $result = $this->Slides->save($slide);
            if ($result) {
                $this->Flash->success('The slide has been updated.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The slide could not be saved. Please, try again.');
            }
        }
        $this->set(compact('slide'));
        $this->set('_serialize', ['slide']);
    }

    /**
     * Delete method
     * ID : CA-06
     * @param string|null $id Slide id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slide = $this->Slides->get($id);
        if ($this->Slides->delete($slide)) {
            $this->Flash->success('The slide has been deleted.');
        } else {
            $this->Flash->error('The slide could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * updatePublish method
     * ID : CA-07
     *
     */
    public function updatePublish() 
    {
        // Set layout as blank to enable json
        $this->layout = ''; 

        $id = $this->request->data['id'];
        $slide = $this->Slides->get($id, [
            'contain' => []
        ]);

        $service = $this->Slides->patchEntity($slide, $this->request->data);
        if($slide->is_publish == 1) {
            $slide->is_publish = 0;
            $message = "Unpublish";
        }else{
            $slide->is_publish = 1;
            $message = "Publish";
        }

        // Update is_publish
        if ($this->Slides->save($slide)) {
            $return['message'] = 'You have successfully set as '.$message;
        } else {
            $return['message'] = 'Unable to update publish.';
        }

        echo json_encode($return);
    }

}
