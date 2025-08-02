<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'senha' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor ',
                'created' => '2025-07-30 11:37:08',
                'modified' => '2025-07-30 11:37:08',
            ],
        ];
        parent::init();
    }
}
