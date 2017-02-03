<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingServicesTable Test Case
 */
class ShippingServicesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ShippingServicesTable     */
    public $ShippingServices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipping_services',
        'app.shipments',
        'app.shipping_carriers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShippingServices') ? [] : ['className' => 'App\Model\Table\ShippingServicesTable'];        $this->ShippingServices = TableRegistry::get('ShippingServices', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShippingServices);

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
