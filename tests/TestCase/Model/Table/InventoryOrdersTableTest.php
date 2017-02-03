<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryOrdersTable Test Case
 */
class InventoryOrdersTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InventoryOrdersTable     */
    public $InventoryOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_orders',
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
        'app.shipments',
        'app.shipping_carriers',
        'app.shipping_services',
        'app.shipping_purposes',
        'app.combine_with'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InventoryOrders') ? [] : ['className' => 'App\Model\Table\InventoryOrdersTable'];        $this->InventoryOrders = TableRegistry::get('InventoryOrders', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryOrders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
