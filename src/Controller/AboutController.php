<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\CellTrait;
use Cake\Routing\Router;

class AboutController extends AppController
{
    public $helpers  = ['NavigationSelector','Siezi/SimpleCaptcha.SimpleCaptcha'];
    public $paginate = ['maxLimit' => 10];

    use CellTrait;

    /**
     * Initialize Method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["about"];
        $this->set('nav_selected', $nav_selected);
        $this->set('website_title', 'Comfort Packaging');
        $this->set('page_title', 'About Us');
    }    
    
    /**
     * BeforeFilter Method
     *  ID : CA-02
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','filter']);
    }

    /**
     * Index method for homepage
     *  ID : CA-03
     * @return void
     */

    public function index()
    {
        //return $this->redirect(['controller' => 'users', 'action' => 'login']);
        $this->viewBuilder()->layout('frontend/default');        
    }

}
