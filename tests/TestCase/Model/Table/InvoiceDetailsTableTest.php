<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceDetailsTable Test Case
 */
class InvoiceDetailsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InvoiceDetailsTable     */
    public $InvoiceDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoice_details',
        'app.invoices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvoiceDetails') ? [] : ['className' => 'App\Model\Table\InvoiceDetailsTable'];        $this->InvoiceDetails = TableRegistry::get('InvoiceDetails', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoiceDetails);

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
