<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChamadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChamadosTable Test Case
 */
class ChamadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChamadosTable
     */
    protected $Chamados;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Chamados',
        'app.Clientes',
        'app.Tecnicos',
        'app.Categorias',
        'app.Arquivos',
        'app.Respostas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chamados') ? [] : ['className' => ChamadosTable::class];
        $this->Chamados = $this->getTableLocator()->get('Chamados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Chamados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ChamadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ChamadosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
