<?php
namespace App\Model\Table;

use App\Model\Entity\Notification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use \DateTime;
use Cake\ORM\TableRegistry;
/**
 * Notifications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Recipients
 * @property \Cake\ORM\Association\BelongsTo $TableRefrences
 * @property \Cake\ORM\Association\BelongsTo $Semesters
 * @property \Cake\ORM\Association\BelongsTo $Schools
 * @property \Cake\ORM\Association\BelongsTo $Senders
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\BelongsTo $Assignments
 */
class NotificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('notifications');
        $this->displayField('description');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'sender_user_id'
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
            ->add('type_id', 'valid', ['rule' => 'numeric'])
            ->notEmpty('type_id');
            
        $validator
            ->scalar('en_body')
            ->maxLength('en_body', 80)
            ->requirePresence('en_body', 'create')
            ->notEmpty('en_body');

        $validator
            ->scalar('ar_body')
            ->maxLength('ar_body', 80)
            ->requirePresence('ar_body', 'create')
            ->notEmpty('ar_body');            

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
        return $rules;
    }

    /**
     * insert notification to the users
     * 
     *
     * @param recipients_users
     * @param notification_data notification data array 
     * @param true mean delete old notification you can set it true in the edit functions only
     */
    function SendNotification($notification_data = array(),$recipients_users = array(),$sender_id = null)
    {
        if(!empty($recipients_users))
        {        
            $notificationsRecipients = TableRegistry::get('NotificationsRecipients');
            $notification_data['created'] = date("Y-m-d H:i:s");
            $notification_data['sender_id'] = $sender_id;
            $notification = $this->newEntity();
            $notification = $this->patchEntity($notification,$notification_data);
            $notification_saved = $this->save($notification);
            if($notification_saved)
            {
                foreach ($recipients_users as $key => $user) 
                {       
                    $notifications_recipients = $notificationsRecipients->newEntity();
                    $notifications_recipients = $notificationsRecipients->patchEntity($notifications_recipients,['notification_id' => $notification_saved->id, 'user_id' => $user,'created' => date("Y-m-d H:i:s"),'modified' => date("Y-m-d H:i:s") ]);
                    $notificationsRecipients->save($notifications_recipients);
                } 
            }
        }
    }

    function GetUserNotificationsInPeriod($startDate = null,$endDate = null,$user_id = null,$semester_id = null)
    {
        $Users = TableRegistry::get('Users');
        $NotificationsRecipients = TableRegistry::get('NotificationsRecipients');

        $notifications = $NotificationsRecipients->find('all',['fields' => ['NotificationsRecipients.seen','Notifications.id','Notifications.comment_id','Notifications.assignment_id','Notifications.type','Notifications.lecture_id','Notifications.description','Notifications.arabic_description','Notifications.publishing_datetime','Notifications.table_name','Notifications.table_refrence_id','Notifications.body','Notifications.arabic_body','Notifications.sender_id'],
                                                                    'conditions' => ['NotificationsRecipients.user_id' => $user_id,'Notifications.publishing_datetime <=' => $endDate,'Notifications.publishing_datetime >=' => $startDate,'Notifications.semester_id' => $semester_id,'Notifications.deleted' => 0],'contain' => ['Notifications']])->toArray();

        if($notifications)
        {
            foreach ($notifications as $key => $notification) 
            {            
                $user = $Users->find('all',['fields' => ['id','first_name','family_name'],'conditions' => ['id' => $notification['notification']['sender_id'],'deleted' => 0]])->first();
                if($user)
                {
                    $notifications[$key]['notification']['url'] = $notification['notification']['table_name'].'/view/'.$notification['notification']['table_refrence_id'];
                }   
                else
                    unset($notifications[$key]);
            }
            return $notifications;
        }
        else
            return false;
        // pr($notifications);exit;
    }

}