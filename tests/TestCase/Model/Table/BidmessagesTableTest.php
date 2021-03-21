<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidmessagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidmessagesTable Test Case
 */
class BidmessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BidmessagesTable
     */
    protected $Bidmessages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bidmessages',
        'app.Bidinfos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bidmessages') ? [] : ['className' => BidmessagesTable::class];
        $this->Bidmessages = $this->getTableLocator()->get('Bidmessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bidmessages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
