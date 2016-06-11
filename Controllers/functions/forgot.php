<?php

if(isset($_POST['submit'])){
	require_once(CONTROLLERS.'functions/class.phpmailer.php');
	$id=$_POST['id'];
		

	$sql = "SELECT password, name ,email, username FROM ";
	$sql.="log_";
	$sql.= ($frm=='s')?"s":"f";
	$sql.=" WHERE username='$id'";
	$sql.=" OR email='$id' AND flag=1";
	$result=$db->query($sql);
	$count =$result->num_rows;
	
	if($count == 1)
	{
		$rows = $result->fetch_array();
		error_reporting(E_STRICT);

		$mail             = new PHPMailer();

		
		//$body             = preg_replace('/[\]/','',$body);

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.yourdomain.com"; // SMTP server
		$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "imessit@gmail.com";  // GMAIL username
		$mail->Password   = "sasy@123";            // GMAIL password

		$mail->SetFrom('imessit@gmail.com', 'IME');

		$mail->AddReplyTo('imessit@gmail.com', 'IME');

		$mail->Subject    = "Recover Password - ".SHORTNAME;
		$body             = "Dear ".$rows['name'].", <br /><br /> Username : ".$rows['username']." <br />Password :  ". $rows['password'];
		$body.="<br /><br /><br />Machine generated message.";
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);

		$address = $rows['email'];
		$mail->AddAddress($address, $row['name']);

		if(!$mail->Send()) {
			$_SESSION['_m']="Password recovery failed.";
			$_SESSION['_mb']="Contact Admin.";
			$_SESSION['_t']='d';
			echo "<script>window.location.assign(window.location.href)</script>";
		} else {
			$_SESSION['_m']="Request Sent successfully.";
			$_SESSION['_t']='s';
			echo "<script>window.location.assign(window.location.href)</script>";
		}
 
	}
	else {
		$_SESSION['_m']="User not found!";
		$_SESSION['_mb']="No one is registered with this email or username.<br/> Please check if you made a spelling mistake.";
		$_SESSION['_t']='w';
		echo "<script>window.location.assign(window.location.href)</script>";
	}
	
	
}

?>
