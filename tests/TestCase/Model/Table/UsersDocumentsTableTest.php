<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersDocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersDocumentsTable Test Case
 */
class UsersDocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersDocumentsTable
     */
    public $UsersDocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_documents',
        'app.users',
        'app.statuses',
        'app.roles',
        'app.notifications',
        'app.refresh_tokens',
        'app.users_wallet',
        'app.document_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersDocuments') ? [] : ['className' => UsersDocumentsTable::class];
        $this->UsersDocuments = TableRegistry::get('UsersDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersDocuments);

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
