<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersDocumentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersDocumentsController Test Case
 */
class UsersDocumentsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
