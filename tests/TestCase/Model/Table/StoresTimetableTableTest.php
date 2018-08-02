<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoresTimetableTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoresTimetableTable Test Case
 */
class StoresTimetableTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoresTimetableTable
     */
    public $StoresTimetable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stores_timetable',
        'app.stores',
        'app.days'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StoresTimetable') ? [] : ['className' => StoresTimetableTable::class];
        $this->StoresTimetable = TableRegistry::get('StoresTimetable', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoresTimetable);

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
