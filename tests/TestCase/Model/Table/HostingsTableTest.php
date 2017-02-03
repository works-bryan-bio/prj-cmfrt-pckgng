<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HostingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HostingsTable Test Case
 */
class HostingsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Hostings' => 'app.hostings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hostings') ? [] : ['className' => 'App\Model\Table\HostingsTable'];
        $this->Hostings = TableRegistry::get('Hostings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hostings);

        parent::tearDown();
    }

    public function testFindIsPublish()
    {

        $query = $this->Hostings->findAllPublished($this->Hostings->find('all',['fields' => ['id', 'title']]));

        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'title' => 'Test case 01'],
            ['id' => 3, 'title' => 'Test case 03']
        ];

        $this->assertEquals($expected, $result);
    }
}
