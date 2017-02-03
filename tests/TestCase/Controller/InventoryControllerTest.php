<?php
namespace App\Test\TestCase\Controller;

use App\Controller\InventoryController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\InventoryController Test Case
 */
class InventoryControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory',
        'app.shipments',
        'app.clients',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.user_entities',
        'app.project_discussions',
        'app.project_proposal_discussions',
        'app.project_proposals',
        'app.projects',
        'app.shipping_carriers',
        'app.shipping_services',
        'app.shipping_purposes',
        'app.combine_with'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
