<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingTable Test Case
 */
class ShippingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShippingTable
     */
    protected $Shipping;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shipping',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Shipping') ? [] : ['className' => ShippingTable::class];
        $this->Shipping = $this->getTableLocator()->get('Shipping', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Shipping);

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
