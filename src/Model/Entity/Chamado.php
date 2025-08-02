<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chamado Entity
 *
 * @property int $id
 * @property int|null $cliente_id
 * @property int|null $tecnico_id
 * @property int|null $categoria_id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Tecnico $tecnico
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Arquivo[] $arquivos
 * @property \App\Model\Entity\Resposta[] $respostas
 */
class Chamado extends Entity
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
        'cliente_id' => true,
        'tecnico_id' => true,
        'categoria_id' => true,
        'titulo' => true,
        'descricao' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'cliente' => true,
        'tecnico' => true,
        'categoria' => true,
        'arquivos' => true,
        'respostas' => true,
    ];
}
