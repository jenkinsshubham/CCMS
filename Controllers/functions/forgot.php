<?php
require __DIR__.'/mailer.php';

if(isset($_POST['submit'])){

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
		$Subject="Recovery Mail";
		$HtmlBody             = "Dear ".$rows['name'].", <br /><br /> Username : ".$rows['username']." <br />Password :  ". $rows['password'];
		$HtmlBody.="<br /><br /><br />Machine generated message.";
		$PlainMessage   = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$address = $rows['email'];
		$To=array($address=>$row['name']);


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
 
	}
	else {
		$_SESSION['_m']="User not found!";
		$_SESSION['_mb']="No one is registered with this email or username.<br/> Please check if you made a spelling mistake.";
		$_SESSION['_t']='w';
		echo "<script>window.location.assign(window.location.href)</script>";
	}
	
	
}

?>
