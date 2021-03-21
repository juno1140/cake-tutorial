<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidrequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidrequestsTable Test Case
 */
class BidrequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BidrequestsTable
     */
    protected $Bidrequests;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bidrequests',
        'app.Biditems',
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
        $config = $this->getTableLocator()->exists('Bidrequests') ? [] : ['className' => BidrequestsTable::class];
        $this->Bidrequests = $this->getTableLocator()->get('Bidrequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bidrequests);

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
