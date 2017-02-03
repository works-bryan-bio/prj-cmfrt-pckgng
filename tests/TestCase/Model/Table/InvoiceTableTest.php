<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceTable Test Case
 */
class InvoiceTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InvoiceTable     */
    public $Invoice;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoice',
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
        $config = TableRegistry::exists('Invoice') ? [] : ['className' => 'App\Model\Table\InvoiceTable'];        $this->Invoice = TableRegistry::get('Invoice', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Invoice);

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
