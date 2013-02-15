<?php

class Email {
	public static function send (
		$from_name, 
		$from_email, 
		$to_name, 
		$to_email, 
		$subject, 
		$message) {

    $response = Mandrill::request(
    	'messages/send', array(
			'message' => array(
		        'from_name' 	=> $from_name,
		        'from_email' 	=> $from_email,
		        'to' => array(
		        	array(
		        		'name'	=> $to_name,
		        		'email'	=> $to_email
		        	)
		        ),
		        'subject' 		=> $subject,
		        'html' 			=> $message,
	    	),
	   	)
    );
	}
}