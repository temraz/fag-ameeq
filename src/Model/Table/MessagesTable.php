<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \App\Model\Table\RequestsTable|\Cake\ORM\Association\BelongsTo $Requests
 * @property \App\Model\Table\SendersTable|\Cake\ORM\Association\BelongsTo $Senders
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\BelongsTo $ParentMessages
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\BelongsTo $Attachments
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $ChildMessages
 * @property \App\Model\Table\MessagesRecipientsTable|\Cake\ORM\Association\HasMany $MessagesRecipients
 *
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MessagesTable extends Table
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

        $this->setTable('messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentMessages', [
            'className' => 'Messages',
            'foreignKey' => 'parent_id'
        ]);
        // $this->belongsTo('Attachments', [
        //     'foreignKey' => 'attachment_id'
        // ]);
        $this->hasMany('ChildMessages', [
            'className' => 'Messages',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('MessagesRecipients', [
            'foreignKey' => 'message_id'
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
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['sender_id'], 'Users'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentMessages'));
        // $rules->add($rules->existsIn(['attachment_id'], 'Attachments'));
        return $rules;
    }
}
