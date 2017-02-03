<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherPagesTable Test Case
 */
class OtherPagesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'OtherPages' => 'app.other_pages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OtherPages') ? [] : ['className' => 'App\Model\Table\OtherPagesTable'];
        $this->OtherPages = TableRegistry::get('OtherPages', $config);
    }

    public function testFindIsPublish()
    {

        $query = $this->OtherPages->findAllPublished($this->OtherPages->find('all',['fields' => ['id', 'title']]));

        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'title' => 'Test case 01'],
            ['id' => 3, 'title' => 'Test case 03']
        ];

        $this->assertEquals($expected, $result);
    }
}
