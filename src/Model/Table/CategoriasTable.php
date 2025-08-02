<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class CategoriasTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categorias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Chamados', [
            'foreignKey' => 'categoria_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->allowEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        return $validator;
    }
}