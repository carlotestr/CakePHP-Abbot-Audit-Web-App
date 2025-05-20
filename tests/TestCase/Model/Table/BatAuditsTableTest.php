<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BatAuditsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BatAuditsTable Test Case
 */
class BatAuditsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BatAuditsTable
     */
    public $BatAudits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BatAudits',
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
        $config = TableRegistry::getTableLocator()->exists('BatAudits') ? [] : ['className' => BatAuditsTable::class];
        $this->BatAudits = TableRegistry::getTableLocator()->get('BatAudits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BatAudits);

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
