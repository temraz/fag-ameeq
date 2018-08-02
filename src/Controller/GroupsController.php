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
class GroupsController extends AppController
{    

    function addGroup()
    {
        if($this->request->is('post'))
        $this->Help->CheckRequestData($this->request->data);
        if ($this->request->is('post')) 
        {
            $this->loadModel('Groups');
            $this->request->data['name'] = (isset($this->request->data['name']))? $this->request->data['name'] : null;
            $this->request->data['admin_user_id'] = (isset($this->request->data['admin_user_id']))? $this->request->data['admin_user_id'] : null;
            $this->request->data['qr_code'] = (isset($this->request->data['qr_code']))? $this->request->data['qr_code'] : null;
            $this->request->data['created'] = date("Y-m-d H:i:s");
            $this->request->data['modified'] = date("Y-m-d H:i:s");

            $group = $this->Groups->newEntity();
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $saved_group = $this->Groups->save($group);
            // ^1[0-9]{9} mobile
            if ($saved_group) 
            {
                echo json_encode(['success' => 1, 'message' => __('The group has been saved')]);
                exit;
            }
            else
            {
                echo json_encode(['success' => 0,'message' => __('Something went wrong, please contact with support'),'errors' => $user->errors()]);
                exit;                
            }
        } 
    }
    
    function getGroupUsersList() {
        $users = $this->Users->find('all',['fields' => ['name','lat','lng'],'conditions' => ['group_id' => $this->request->query['group_id'] ,'status_id' => 1]])->toArray();
        if($users)
        {
            echo json_encode(['success' => 1,'message' => __('Users has been found'),'users' => $users]);
            exit;
        }
        else
        {
            echo json_encode(['success' => 0,'message' => __('No users belong to this group')]);
            exit;
        }
    }
}