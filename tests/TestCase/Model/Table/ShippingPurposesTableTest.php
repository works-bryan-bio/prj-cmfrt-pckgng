<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingPurposesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingPurposesTable Test Case
 */
class ShippingPurposesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ShippingPurposesTable     */
    public $ShippingPurposes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipping_purposes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShippingPurposes') ? [] : ['className' => 'App\Model\Table\ShippingPurposesTable'];        $this->ShippingPurposes = TableRegistry::get('ShippingPurposes', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShippingPurposes);

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
