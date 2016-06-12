<?php

require_once(CONTROLLERS.'lib/swift/swift_required.php');

// Creating Transport
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com')
	->setUsername('imessit@gmail.com')
	->setPassword('sasy@123');

//  Creating Mailer
$mailer=Swift_Mailer::newInstance($transport);
// Creating Message
$message=Swift_Message::newInstance('$Subject')
	->setFrom(array('imessit@gmail.com'=>'SIT'))
	->setSender('imessit@gmail.com')
	->setTo($To)
	->setBody($HtmlMessage,'text/html');
	->addPart($PlainMessage.'text/plain')
;



?>