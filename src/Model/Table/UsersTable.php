<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\NationalitiesTable|\Cake\ORM\Association\BelongsTo $Nationalities
 * @property \App\Model\Table\StatusesTable|\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\NotificationsTable|\Cake\ORM\Association\HasMany $Notifications
 * @property \App\Model\Table\RefreshTokensTable|\Cake\ORM\Association\HasMany $RefreshTokens
 * @property \App\Model\Table\UsersDocumentsTable|\Cake\ORM\Association\HasMany $UsersDocuments
 * @property \App\Model\Table\UsersWalletTable|\Cake\ORM\Association\HasMany $UsersWallet
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('RefreshTokens', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UsersDocuments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UsersWallet', [
            'foreignKey' => 'user_id'
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
            ->scalar('name')
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 15)
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile')
            ->add('mobile', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message' => __("Mobile number is already exist")]);

        $validator
            ->scalar('email')
            ->maxLength('email', 30)
            ->allowEmpty('email')
            ->add('email', 'ValidEmail', [
                                        'rule' => function ($value, $context) {
                                            if(filter_var($value, FILTER_VALIDATE_EMAIL))
                                                return true;
                                            else
                                                return false;
                                        },
                                        'message' => __("Email is not valid")
                                    ]);


        $validator
            ->boolean('allow_notification');

        $validator
            ->scalar('vehicle_number')
            ->maxLength('vehicle_number', 15)
            ->allowEmpty('vehicle_number');


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
        $rules->add($rules->isUnique(['mobile']));
        // $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        // $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) 
            {
                $output = @$ipdat->geoplugin_countryCode;
            }
        }
        else
        {
            echo json_encode(['success' => 0,'message' => "Invalid Ip addresss"]);
            exit;
        }
        return $output;
    }    
}