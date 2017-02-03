<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectDiscussionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectDiscussionsTable Test Case
 */
class ProjectDiscussionsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ProjectDiscussionsTable     */
    public $ProjectDiscussions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_discussions',
        'app.projects',
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
        $config = TableRegistry::exists('ProjectDiscussions') ? [] : ['className' => 'App\Model\Table\ProjectDiscussionsTable'];        $this->ProjectDiscussions = TableRegistry::get('ProjectDiscussions', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectDiscussions);

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
