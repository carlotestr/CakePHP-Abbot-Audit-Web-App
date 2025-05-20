<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ErrorCoachingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ErrorCoachingsTable Test Case
 */
class ErrorCoachingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ErrorCoachingsTable
     */
    public $ErrorCoachings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ErrorCoachings',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ErrorCoachings') ? [] : ['className' => ErrorCoachingsTable::class];
        $this->ErrorCoachings = TableRegistry::getTableLocator()->get('ErrorCoachings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ErrorCoachings);

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
