<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TecnicosFixture
 */
class TecnicosFixture extends TestFixture
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
                'especialidade' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-07-29 00:16:41',
                'modified' => '2025-07-29 00:16:41',
            ],
        ];
        parent::init();
    }
}
