<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->autoRender = false;
        $this->loadComponent('Help');
        parent::initialize();
        // if(!in_array(ucwords($this->request->action), ['Login','SignUp','GetRefreshToken','ActivateAccount','ForgetPassword','CheckResetPasswordCode','ResetPassword']))
        // {
        //     $this->CheckAuthToken();
            
        //     if(isset($this->request->query['address_ip']))
        //     {
        //         $this->loadModel('Users');
        //         $user_id = $this->Help->GetUserId($this->request->query['auth_token']);
        //         $this->loadModel('UsersIps');
        //         $check_ip = $this->UsersIps->find('all',['conditions' => ['user_id' => $user_id,'user_ip' => ip2long($this->request->query['address_ip'])]])->first();
        //         if($check_ip)
        //             $country_code = $check_ip->country_code;
        //         else
        //         {
        //             $country_code = $this->Users->ip_info($this->request->query['address_ip']);
        //             $user_ip = $this->UsersIps->newEntity();
        //             $user_ip = $this->UsersIps->patchEntity($user_ip, ['user_id' => $user_id,'user_ip' => ip2long($this->request->query['address_ip']),'country_code' => $country_code,'created' => date("Y-m-d H:i:s")]);
        //             $this->UsersIps->save($user_ip);

        //         }
        //         if($country_code)
        //         {
        //             $this->SetConfiguration($country_code);
        //         }
        //         else
        //         {
        //             echo json_encode(['success' => 0,'message' => __("Something went wrong, please contact with support"),'error'  => 'Invalid IP']);
        //             exit;
        //         }
        //     }
        //     else
        //     {
        //         echo json_encode(['success' => 0,'message' => __("address_ip is required")]);
        //         exit;            
        //     }
        // }
        $this->loadComponent('RequestHandler');
    }

    function SetConfiguration($country_code = null)
    {
        Configure::write('country', $country_code);
        if(Configure::read('country') == 'SA')
        {
            Configure::write('currency', 'SAR');
            Configure::write('delivery_min_price', 15);
        }
        else if(Configure::read('country') == 'EG')
        {
            Configure::write('currency', 'EGP');                
            Configure::write('delivery_min_price', 10);
        }
        return true;
    }

    function CheckAuthToken()
    {
        if(!isset($this->request->query['auth_token']) || $this->request->query['auth_token'] == '')
        {
            echo json_encode(['success' => 0,'message' => __("Auth token is required")]);
            exit;
        }
        $this->loadModel('AuthTokens');
        $has_access = $this->AuthTokens->find('all',['conditions' => ['auth_token' => $this->request->query['auth_token']]])->first();
        if($has_access && $has_access->expires >= strtotime(date("Y-m-d H:i:s"))) 
        {
            return true;
        }
        else if(!$has_access || $has_access->expires < strtotime(date("Y-m-d H:i:s")))
        {
            echo json_encode(['success' => 0,'message' => __("Your access token has been expired")]);
            exit;
        }
    }

    function GetProfilePic($user_id = null,$size = 96)
    {
        $this->loadComponent('S3');
        $this->loadModel('Users');
        $user = $this->Users->find('all',['fields' => ['id','gender','role_id','profile_pic'],'conditions' => ['id' => $user_id]])->first();
        if($user)
        {
            if($user->profile_pic == NULL || $user->profile_pic == '')
            {
                if($user->profile_pic == null && $user->gender == 1)
                    return $profile_pic = $this->S3->authenticatedUrl('profile_pics/faces/male.png',36000);
                else if ($user->profile_pic == null && $user->gender == 2)
                    return $profile_pic = $this->S3->authenticatedUrl('profile_pics/faces/female.png',36000);
                else
                    return $profile_pic = $this->S3->authenticatedUrl('profile_pics/faces/face.png',36000);
            }
            else
            {
                if($size != 0)
                    return $profile_pic = $this->S3->authenticatedUrl('profile_pics/'.$size.'*'.$size.'/'.$user->profile_pic,36000);
                else
                    return $profile_pic = $this->S3->authenticatedUrl('profile_pics/original_size/'.$user->profile_pic,36000);

            }
        }
    } 

    function beforeFilter(Event $event)
    {
        // $this->loadModel('AuthTokens');
        // $this->loadModel('Users');
        // $this->request->query['auth_token'] = (isset($this->request->query['auth_token']))? $this->request->query['auth_token'] : null;
        // $user_id = $this->AuthTokens->find('all',['conditions' => ['auth_token' => $this->request->query['auth_token']]])->first();
        // if($user_id)
        // {
        //     $user = $this->Users->find('all', ['fields' => ['id','language'],'conditions' => ['id' => $user_id->user_id]])->first();
        //     if($user && $user->language == 1)
        //         I18n::locale('ar_EG');    
        //     else if($user && $user->language == 2)
        //         I18n::locale('en_US');    
        // }
        // else if(isset($this->request->query['language']))
        // {
        //     if($this->request->query['language'] == 'en')
        //         I18n::locale('en_US');
        //     else if($this->request->query['language'] == 'ar')
        //         I18n::locale('ar_EG');
        //     else 
        //         I18n::locale('en_US');
        // }
        // else
        // {
        //     I18n::locale('en_US');    
        // }
    }

    function AfterFilter(Event $event)
    {
        die();
    }
    
}
