<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShipmentStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentStatusTable Test Case
 */
class ShipmentStatusTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ShipmentStatusTable     */
    public $ShipmentStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipment_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShipmentStatus') ? [] : ['className' => 'App\Model\Table\ShipmentStatusTable'];        $this->ShipmentStatus = TableRegistry::get('ShipmentStatus', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShipmentStatus);

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
