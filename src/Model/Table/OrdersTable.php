<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\ClientUsersTable|\Cake\ORM\Association\BelongsTo $ClientUsers
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\RequestBetsTable|\Cake\ORM\Association\HasMany $RequestBets
 *
 * @method \App\Model\Entity\Request get($primaryKey, $options = [])
 * @method \App\Model\Entity\Request newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Request[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Request[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Invoices', [
            'foreignKey' => 'request_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'request_id'
        ]);
        $this->hasMany('RequestBets', [
            'foreignKey' => 'request_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 1000)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('delivery_time_id')
            ->maxLength('delivery_time_id', 11)
            ->requirePresence('delivery_time_id', 'create')
            ->notEmpty('delivery_time_id');

        $validator
            ->scalar('store_id')
            ->maxLength('store_id', 1000)
            ->requirePresence('store_id', 'create')
            ->notEmpty('store_id');

        $validator
            ->scalar('store_name')
            ->maxLength('store_name', 256)
            ->requirePresence('store_name', 'create')
            ->notEmpty('store_name');

        $validator
            ->maxLength('store_lat', 256)
            ->requirePresence('store_lat', 'create')
            ->notEmpty('store_lat');

        $validator
            ->maxLength('store_lng', 256)
            ->requirePresence('store_lng', 'create')
            ->notEmpty('store_lng');

        $validator
            ->maxLength('client_lat', 256)
            ->requirePresence('client_lat', 'create')
            ->notEmpty('client_lat');

        $validator
            ->maxLength('client_lng', 256)
            ->requirePresence('client_lng', 'create')
            ->notEmpty('client_lng');                        

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
        // $rules->add($rules->existsIn(['client_user_id'], 'Users'));
        return $rules;
    }
}
