<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
// use Cake\ORM\TableRegistry;
/**
 * Multi roles select component to select more than one role at the same time
 *
 * @author Mohamed temraz
 * @copyright Mohamed temraz  2016
 * @see 
 */

class SmsComponent extends Component
{
    var $name = "Sms";
    var $username = 'info@free-dimension.com';
    var $sender_name = 'Classera';
    var $encoding= 0;
    
    private $AppSid = 'KU_Fli2xMRd1K2qdZ7dQzYzu5n3LH';

	function send($data = [])
	{
		if(empty($data))
		{
			echo json_encode(['success' => 0,'message' => __("Request data can not be empty, please contact with support")]);
			exit;
		}
        if(empty($sender_name))
            $sender_name = 'Classera';

        $fields = array(
                'Recipient' => $data['numbers'],
                'Body' => $data['message'],
                'SenderID' => $sender_name,
                'AppSid' => $this->AppSid);

        $fields_string = '';

        foreach($fields as $key=>$value)
            $fields_string .= $key.'='.$value.'&';

        rtrim($fields_string, '&');

        // $url = 'http://api.unifonic.com/rest/Messages/SendBulk';

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_POST, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        // curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds

        // $response = curl_exec($ch);
        // curl_close($ch);

        // $results = json_decode($response);
        // return $results->success;
        return true;
	}

}