<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingCarriersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingCarriersTable Test Case
 */
class ShippingCarriersTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ShippingCarriersTable     */
    public $ShippingCarriers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipping_carriers',
        'app.shipments',
        'app.shipping_services'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShippingCarriers') ? [] : ['className' => 'App\Model\Table\ShippingCarriersTable'];        $this->ShippingCarriers = TableRegistry::get('ShippingCarriers', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShippingCarriers);

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
}
