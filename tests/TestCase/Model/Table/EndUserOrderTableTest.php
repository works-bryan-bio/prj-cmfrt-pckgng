<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EndUserOrderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EndUserOrderTable Test Case
 */
class EndUserOrderTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\EndUserOrderTable     */
    public $EndUserOrder;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.end_user_order',
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
        'app.shipping_services',
        'app.shipments',
        'app.shipping_carriers',
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
        $config = TableRegistry::exists('EndUserOrder') ? [] : ['className' => 'App\Model\Table\EndUserOrderTable'];        $this->EndUserOrder = TableRegistry::get('EndUserOrder', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EndUserOrder);

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
