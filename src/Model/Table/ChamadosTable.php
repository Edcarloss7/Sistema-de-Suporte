<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ChamadosTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('chamados');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
        ]);
        $this->belongsTo('Tecnicos', [
            'foreignKey' => 'tecnico_id',
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
        ]);
        $this->hasMany('Arquivos', [
            'foreignKey' => 'chamado_id',
        ]);
        $this->hasMany('Respostas', [
            'foreignKey' => 'chamado_id',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('cliente_id')
            ->allowEmptyString('cliente_id');

        $validator
            ->integer('tecnico_id')
            ->allowEmptyString('tecnico_id');

        $validator
            ->integer('categoria_id')
            ->allowEmptyString('categoria_id');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->allowEmptyString('titulo');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'), ['errorField' => 'cliente_id']);
        $rules->add($rules->existsIn(['tecnico_id'], 'Tecnicos'), ['errorField' => 'tecnico_id']);
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'), ['errorField' => 'categoria_id']);

        return $rules;
    }
}
