<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgentDisputesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgentDisputesTable Test Case
 */
class AgentDisputesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgentDisputesTable
     */
    public $AgentDisputes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AgentDisputes',
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
        $config = TableRegistry::getTableLocator()->exists('AgentDisputes') ? [] : ['className' => AgentDisputesTable::class];
        $this->AgentDisputes = TableRegistry::getTableLocator()->get('AgentDisputes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AgentDisputes);

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
