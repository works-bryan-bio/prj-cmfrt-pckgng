<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\CellTrait;
use Cake\Routing\Router;

/**
 * Main Controller
 *
 * @property \App\Model\Table\UsersTable $Main
 */
class MainController extends AppController
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
        $nav_selected = ["home"];
        $this->set('nav_selected', $nav_selected);
        $this->set('website_title', 'Comfort Packaging');
        $this->set('page_title', 'Home');
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

    /**
     * Index method for homepage
     *  ID : CA-04
     * @return void
     */

    public function filter()
    {
        $this->Versions    = TableRegistry::get('Versions');
        $this->ModuleTypes = TableRegistry::get('ModuleTypes');

        $mods    = $this->ModuleTypes->find('all');
        $modules = array();
        $modules[0] = 'All';
        foreach( $mods as $mod ){
            $modules[$mod->id] = $mod->name;
        }

        $query = $this->request->query;
        if( isset($query['module_type']) && $query['module_type'] != '' ){
            switch ($query['module_type']) {
                case 0:
                    $versions = $this->Versions->find('all')
                        ->contain(['ModuleTypes'])
                        ->order(['Versions.version' => 'DESC']);        
                    break;
                default:
                    $versions = $this->Versions->find('all')
                        ->contain(['ModuleTypes'])
                        ->where(['Versions.module_type_id' => $query['module_type']])     
                        ->order(['Versions.version' => 'DESC']);               
                    break;
            }  
        }else{
            $versions = $this->Versions->find('all')
                ->contain(['ModuleTypes'])              
                ->order(['Versions.version' => 'DESC']);              
        }

        $this->set(['versions' => $versions, 'modules' => $modules]);
        $this->layout = "main";
    }

}
