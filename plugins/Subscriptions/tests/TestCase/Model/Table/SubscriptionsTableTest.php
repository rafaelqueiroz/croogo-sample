<?php
namespace Subscriptions\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Subscriptions\Model\Table\SubscriptionsTable;

/**
 * Subscriptions\Model\Table\SubscriptionsTable Test Case
 */
class SubscriptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Subscriptions\Model\Table\SubscriptionsTable
     */
    public $Subscriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.subscriptions.subscriptions',
        'plugin.subscriptions.plans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Subscriptions') ? [] : ['className' => SubscriptionsTable::class];
        $this->Subscriptions = TableRegistry::get('Subscriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subscriptions);

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
