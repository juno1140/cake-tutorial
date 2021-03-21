<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidinfoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidinfoTable Test Case
 */
class BidinfoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BidinfoTable
     */
    protected $Bidinfo;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bidinfo',
        'app.Biditems',
        'app.Users',
        'app.Bidmessages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bidinfo') ? [] : ['className' => BidinfoTable::class];
        $this->Bidinfo = $this->getTableLocator()->get('Bidinfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bidinfo);

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
