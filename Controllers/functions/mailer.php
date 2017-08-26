<?php

require_once(CONTROLLERS.'lib/swift/swift_required.php');
$To='sumeetac6@gmail.com';
$Subject="Notice";
$HtmlMessage="<b>HI</b>";
$PlainMessage="hi";
// Creating Transport
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com',465)
	->setUsername('imessit@gmail.com')
	->setPassword('sasy@123');

//  Creating Mailer
$mailer=Swift_Mailer::newInstance($transport);
// Creating Message
$message=Swift_Message::newInstance('$Subject')
	->setFrom(array('imessit@gmail.com'=>'SIT'))
	->setSender('imessit@gmail.com')
	->setTo($To)
	->setBody($HtmlMessage,'text/html')
	->addPart($PlainMessage.'text/plain')
;
		if(!$mailer->send($message)) {
			$_SESSION['_m']="Password recovery failed.";
			$_SESSION['_mb']="Contact Admin.";
			$_SESSION['_t']='d';
			echo "<script>window.location.assign(window.location.href)</script>";
		} else {
			$_SESSION['_m']="Request Sent successfully.";
			$_SESSION['_t']='s';
			echo "<script>window.location.assign(window.location.href)</script>";
		}



?>