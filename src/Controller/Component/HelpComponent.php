<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
/**
 * Multi roles select component to select more than one role at the same time
 *
 * @author Mohamed temraz
 * @copyright Mohamed temraz  2018
 * @see 
 */
class HelpComponent extends Component
{
	function CheckRequestData($data = [])
	{
		if(empty($data))
		{
			echo json_encode(['success' => 0,'message' => __("Request data can not be empty")]);
			exit;
		}
	}

	function CheckRequestType($request_type = null, $function_type = null)
	{
		if(($request_type == null) || ($function_type == null) || $request_type != $function_type)
		{
			echo json_encode(['success' => 1, 'message' => __("Request Type is invalid")]);
			return false;
		}
		else
			return true;
	}	

	function GetUserID($auth_token = null)
	{
        $AuthTokens = TableRegistry::get('AuthTokens');
        $auth_token_exist = $AuthTokens->find('all',['fields' => 'user_id','conditions' => ['auth_token' => $auth_token]])->first();
        if($auth_token_exist)
        	return $auth_token_exist->user_id;
        else
            echo json_encode(['success' => 0,'message' => __("User does not exist, please contact with support")]);
	}
}