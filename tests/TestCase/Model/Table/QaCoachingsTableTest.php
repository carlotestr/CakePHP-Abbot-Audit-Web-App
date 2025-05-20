<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QaCoachingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QaCoachingsTable Test Case
 */
class QaCoachingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QaCoachingsTable
     */
    public $QaCoachings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.QaCoachings',
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
        $config = TableRegistry::getTableLocator()->exists('QaCoachings') ? [] : ['className' => QaCoachingsTable::class];
        $this->QaCoachings = TableRegistry::getTableLocator()->get('QaCoachings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QaCoachings);

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
