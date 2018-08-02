<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersWalletTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersWalletTable Test Case
 */
class UsersWalletTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersWalletTable
     */
    public $UsersWallet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_wallet',
        'app.users',
        'app.statuses',
        'app.roles',
        'app.notifications',
        'app.refresh_tokens',
        'app.users_documents',
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
        $config = TableRegistry::exists('UsersWallet') ? [] : ['className' => UsersWalletTable::class];
        $this->UsersWallet = TableRegistry::get('UsersWallet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersWallet);

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
