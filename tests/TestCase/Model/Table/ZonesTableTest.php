<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZonesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZonesTable Test Case
 */
class ZonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ZonesTable
     */
    protected $Zones;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Zones',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Zones') ? [] : ['className' => ZonesTable::class];
        $this->Zones = $this->getTableLocator()->get('Zones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Zones);

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
}
