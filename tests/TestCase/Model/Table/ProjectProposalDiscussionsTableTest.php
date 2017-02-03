<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectProposalDiscussionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectProposalDiscussionsTable Test Case
 */
class ProjectProposalDiscussionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectProposalDiscussionsTable
     */
    public $ProjectProposalDiscussions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_proposal_discussions',
        'app.project_proposals',
        'app.clients',
        'app.user_entities',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectProposalDiscussions') ? [] : ['className' => 'App\Model\Table\ProjectProposalDiscussionsTable'];
        $this->ProjectProposalDiscussions = TableRegistry::get('ProjectProposalDiscussions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectProposalDiscussions);

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
