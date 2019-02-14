<?php

if(isset($_GET['send_notification'])){
   send_notification ();
}

function send_notification()
{
	//echo 'Hello';
define( 'API_ACCESS_KEY', 'AAAAwg5CWaY:APA91bFYDREuxpuXPVVckmMDdBXoTWBIIDI5c_fcxDZrKS1o7WJ_bo4zJMAZ3Jqk-dqSL1ZJ7DEHZHKClxqjBDfUSPmfEfM2T0t-QHg-2iuPPsSKO-KllEL-vOSRUn56-BTRTGmi3Gj2');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Firebase Push Notification',
		'title'	=> 'Mark Fluence',
             	
          );
	$fields = array
			(
				'to'		=> $_REQUEST['token'],
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}
?>