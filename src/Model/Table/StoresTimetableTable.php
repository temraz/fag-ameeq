<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresTimetable Model
 *
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\BelongsTo $Stores
 * @property \App\Model\Table\DaysTable|\Cake\ORM\Association\BelongsTo $Days
 *
 * @method \App\Model\Entity\StoresTimetable get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresTimetable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresTimetable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresTimetable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresTimetable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresTimetable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresTimetable findOrCreate($search, callable $callback = null, $options = [])
 */
class StoresTimetableTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stores_timetable');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Days', [
            'foreignKey' => 'day_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->time('open')
            ->requirePresence('open', 'create')
            ->notEmpty('open');

        $validator
            ->time('closed')
            ->requirePresence('closed', 'create')
            ->notEmpty('closed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['day_id'], 'Days'));

        return $rules;
    }
}
