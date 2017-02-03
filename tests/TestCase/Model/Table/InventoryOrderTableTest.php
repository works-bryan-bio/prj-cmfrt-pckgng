<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryOrderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryOrderTable Test Case
 */
class InventoryOrderTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InventoryOrderTable     */
    public $InventoryOrder;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_order',
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
        'app.combine_with',
        'app.inventory_orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InventoryOrder') ? [] : ['className' => 'App\Model\Table\InventoryOrderTable'];        $this->InventoryOrder = TableRegistry::get('InventoryOrder', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryOrder);

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
