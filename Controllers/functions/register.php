<?php
if (isset($_POST['register'])) {
	$frm =$db->real_escape_string($_POST['frm']);
	
	$name = $db->real_escape_string($_POST['name']);
	$username = $db->real_escape_string($_POST['username']);
	$password =$db->real_escape_string($_POST['password']);
	$usn =$db->real_escape_string($_POST['usn']);
	$email =$db->real_escape_string($_POST['email']);
	$br =$db->real_escape_string($_POST['br']);
	$sem =$db->real_escape_string($_POST['sem']);
	$sec =$db->real_escape_string($_POST['sec']);
	
	// QUERYING
	$sql="INSERT INTO ";
	if ($frm=='s') 
		$sql.=" log_s(name,username,password,usn,email,br,sem,sec)";
	else 
		$sql.=" log_f(name,username,password,usn,email,br,sem,sec)";
	$sql.=" VALUES(";
	if ($frm=='s') 
		$sql.=" '$name','$username','$password','$usn','$email','$br','$sem','$sec'";
	else 
		$sql.=" ";
	$sql.=")";
	

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}


	if($result){
		$_SESSION['id'] = $username;
		setcookie('frm', $frm, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: ".BASEPATH);
	}

	else{
		?>
		<script>alert('wrong details');</script>
		<?php
	}

}
?><?php


?>
