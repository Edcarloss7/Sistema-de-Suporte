<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TecnicosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TecnicosTable Test Case
 */
class TecnicosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TecnicosTable
     */
    protected $Tecnicos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tecnicos',
        'app.Chamados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tecnicos') ? [] : ['className' => TecnicosTable::class];
        $this->Tecnicos = $this->getTableLocator()->get('Tecnicos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tecnicos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\TecnicosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
