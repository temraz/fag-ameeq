<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use \DateTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{    
    /**
     * SignUp method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addUser()
    {
        if($this->request->is('post'))
            $this->Help->CheckRequestData($this->request->data);
        if ($this->request->is('post')) 
        {
            $this->request->data['mobile'] = (isset($this->request->data['mobile']))? $this->request->data['mobile'] : null;
            $this->request->data['name'] = (isset($this->request->data['name']))? $this->request->data['name'] : null;
            $this->request->data['group_id'] = (isset($this->request->data['group_id']))? $this->request->data['group_id'] : null;
            $this->request->data['role_id'] = (isset($this->request->data['role_id']))? $this->request->data['role_id'] : null;
            $this->request->data['status_id'] = 2;
            // pr($this->request->getData());exit;
            $check_not_complete_signup = $this->Users->find('all',['fields' => ['id','status_id'],'conditions' => ['mobile' => $this->request->data['mobile'], 'status_id' => 2]])->first();
            if($check_not_complete_signup)
            {
                $this->Users->deleteAll(['id' => $check_not_complete_signup->id]);
            }
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $saved_user = $this->Users->save($user);
            // ^1[0-9]{9} mobile
            if ($saved_user) 
            {
                $this->loadComponent('Sms');
                $code = rand ( 1000 , 9999 );
                $this->loadModel('Verifications');
                $verifications = $this->Verifications->newEntity();
                $verifications = $this->Verifications->patchEntity($verifications, ['verification_type' => 1, 'user_id' => $saved_user->id,'code' => md5($code),'created' => date("Y-m-d H:i:s")]);
                if($this->Verifications->save($verifications))    
                {
                    if($this->Sms->send(['numbers' => $this->request->data['mobile'],'message' => __('Your activation code is ').$code]))
                    {
                        echo json_encode(['success' => 1,'user_id' => $saved_user->id,'code' => $code, 'message' => __('The user has been saved')]);
                        exit;
                    }
                    else
                    {
                        echo json_encode(['success' => 0,'message' => __('Something went wrong, please contact with support'),'error_code' => 1000]);
                        exit;                        
                    }
                } 
                else 
                {
                    echo json_encode(['success' => 0,'message' => __('Something went wrong, please contact with support'),'error_code' => 1001]);
                    exit; 
                }        

            }
            else
            {
                echo json_encode(['success' => 0,'message' => __('Something went wrong, please contact with support'),'errors' => $user->errors()]);
                exit;                
            }
        }
    } 

        /**
     * ActivateAccount method
     *
     * @return \Cake\Http\Response|void
     */
    public function ActivateAccount()
    {
        if($this->request->is('post'))
            $this->Help->CheckRequestData($this->request->data);
        if ($this->request->is('post')) 
        {
            $this->request->data['user_id'] = (isset($this->request->data['user_id']))? $this->request->data['user_id'] : null;
            $this->request->data['code'] = (isset($this->request->data['code']))? $this->request->data['code'] : null;

            $this->loadModel('Verifications');
            $check_code = $this->Verifications->find('all',['conditions' => ['user_id' => $this->request->data['user_id'],'code' => md5($this->request->data['code'])]])->first();
            if($check_code)
            {
                if($this->Users->updateAll(['status_id' => 1],['id' => $this->request->data['user_id']]))
                {
                    $this->Verifications->deleteAll(['user_id' => $this->request->data['user_id'],'code' => md5($this->request->data['code'])]);
                    echo json_encode(['success' => 1,'message' => __('Account has been verified')]);
                }
                else
                {
                    echo json_encode(['success' => 0,'message' => __('Your account is already verified'),'error_code' => 1002]);
                    exit;
                }
            }
            else
            {
                echo json_encode(['success' => 0,'message' => __('Verification code is invalid')]);
                exit;
            }
        }
    }

    function updateUserLocation() 
    {
        if($this->request->is('post'))
        $this->Help->CheckRequestData($this->request->data);
        if ($this->request->is('post')) 
        {
            $this->request->data['lat'] = (isset($this->request->data['lat']))? $this->request->data['lat'] : null;
            $this->request->data['lng'] = (isset($this->request->data['lng']))? $this->request->data['lng'] : null;
            $User = $this->Users->updateAll(['lat' => $this->request->data['lat'],'lng' => $this->request->data['lng']],['id' => $this->request->data['user_id']]);
            echo json_encode(['success' => 1,'message' => __('Location has been updated')]);
            exit;
            
        } 
    }

    function getUserinfo() {
        $user = $this->Users->find('all',['conditions' => ['id' => $this->request->data['user_id']]])->first();
        if($user)
        {
            echo json_encode($user);
            exit;
        }
    }

}