<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arquivo Entity
 *
 * @property int $id
 * @property int|null $chamado_id
 * @property string|null $nome
 * @property string|null $caminho_arquivo
 * @property string|null $tipo
 * @property int|null $tamanho
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Chamado $chamado
 */
class Arquivo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'chamado_id' => true,
        'nome' => true,
        'caminho_arquivo' => true,
        'tipo' => true,
        'tamanho' => true,
        'created' => true,
        'chamado' => true,
    ];
}
