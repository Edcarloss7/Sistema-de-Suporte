<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArquivosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArquivosTable Test Case
 */
class ArquivosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArquivosTable
     */
    protected $Arquivos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Arquivos',
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
        $config = $this->getTableLocator()->exists('Arquivos') ? [] : ['className' => ArquivosTable::class];
        $this->Arquivos = $this->getTableLocator()->get('Arquivos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Arquivos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ArquivosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ArquivosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
