<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArquivosFixture
 */
class ArquivosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'chamado_id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'caminho_arquivo' => 'Lorem ipsum dolor sit amet',
                'tipo' => 'Lorem ipsum dolor sit amet',
                'tamanho' => 1,
                'created' => '2025-07-29 00:16:44',
            ],
        ];
        parent::init();
    }
}
