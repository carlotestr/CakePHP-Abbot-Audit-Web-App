<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QaGoalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QaGoalsTable Test Case
 */
class QaGoalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QaGoalsTable
     */
    public $QaGoals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.QaGoals',
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
        $config = TableRegistry::getTableLocator()->exists('QaGoals') ? [] : ['className' => QaGoalsTable::class];
        $this->QaGoals = TableRegistry::getTableLocator()->get('QaGoals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QaGoals);

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
