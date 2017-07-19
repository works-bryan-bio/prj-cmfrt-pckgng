<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\CellTrait;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

class ContactController extends AppController
{
    public $helpers  = ['NavigationSelector','Siezi/SimpleCaptcha.SimpleCaptcha'];
    public $paginate = ['maxLimit' => 10];

    use CellTrait;

    /**
     * Initialize Method     
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["contact"];
        $this->set('nav_selected', $nav_selected);
        $this->set('website_title', 'Comfort Packaging');
        $this->set('page_title', 'Contact');        
    }    
    
    /**
     * BeforeFilter Method
     *  ID : CA-02
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','filter','ajax_send_inquiry']);
    }

    /**
     * Index method for homepage     
     * @return void
     */

    public function index()
    {
        //return $this->redirect(['controller' => 'users', 'action' => 'login']);
        $this->viewBuilder()->layout('frontend/default');        
    }

    /**
     * Ajax Send Inquiry Method     
     * 
     */
    public function ajax_send_inquiry()
    {
        $edata = [
            'email' => $this->request->data['contact_email'],
            'name' => $this->request->data['contact_name'],
            'subject' => $this->request->data['contact_subject'],
            'message' => $this->request->data['contact_message']
        ];
        $recipient = "comfortpackaging@gmail.com";                                
        $email_smtp = new Email('default');
        $email_smtp->from(['comfortapplication@gmail.com' => 'WebSystem'])
            ->template('contact_us')
            ->emailFormat('html')
            ->to($recipient)                                                                                                     
            ->subject('Comfort Packaging : Inquiry Add')
            ->viewVars(['edata' => $edata])
            ->send(); 

        $json_data['is_success'] = true;
        $json_data['message']    = "<div class='alert alert-success'>Thank you for contacting Comfort Packaging, We will reach out to you shortly.</div>";

        echo json_encode($json_data);
        $this->viewBuilder()->layout('');
        exit;  
    }

}
