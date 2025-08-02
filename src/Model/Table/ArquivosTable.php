<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arquivos Model
 *
 * @property \App\Model\Table\ChamadosTable&\Cake\ORM\Association\BelongsTo $Chamados
 *
 * @method \App\Model\Entity\Arquivo newEmptyEntity()
 * @method \App\Model\Entity\Arquivo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Arquivo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Arquivo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Arquivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Arquivo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Arquivo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Arquivo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Arquivo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Arquivo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Arquivo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Arquivo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Arquivo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Arquivo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Arquivo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArquivosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('arquivos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Chamados', [
            'foreignKey' => 'chamado_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('chamado_id')
            ->allowEmptyString('chamado_id');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->scalar('caminho_arquivo')
            ->maxLength('caminho_arquivo', 255)
            ->allowEmptyString('caminho_arquivo');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmptyString('tipo');

        $validator
            ->integer('tamanho')
            ->allowEmptyString('tamanho');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['chamado_id'], 'Chamados'), ['errorField' => 'chamado_id']);

        return $rules;
    }
}
