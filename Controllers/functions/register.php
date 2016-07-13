<?php

	$frm =$db->real_escape_string($_POST['frm']);
	
	$name = $db->real_escape_string($_POST['name']);
	$username = $db->real_escape_string($_POST['username']);
	$password =$db->real_escape_string($_POST['password']);
	$email =$db->real_escape_string($_POST['email']);
	if ($frm=='s'){
		$br =$db->real_escape_string($_POST['br']);
		$sem =$db->real_escape_string($_POST['sem']);
		$sec =$db->real_escape_string($_POST['sec']);
		$usn =$db->real_escape_string($_POST['usn']);
	}
	else {
		$fid =$db->real_escape_string($_POST['fid']);
		$department =$db->real_escape_string($_POST['department']);
	}
// HASHING




	// RESTERING
	$sql="INSERT INTO log_";
	if ($frm=='s') $sql.="s";
	else $sql.="f";
	$sql.="(name,username,password,email,";
	if ($frm=='s') 
		$sql.="usn,br,sem,sec)";
	else 
		$sql.="fid,br)";
	$sql.=" VALUES('$name','$username','$hash','$email',";
	if ($frm=='s') 
		$sql.="'$usn','$br','$sem','$sec'";
	else 
		$sql.="'$fid','$department'";
	$sql.=")";
	

	$result=$db->query($sql);

	if (!$result) {
		// echo('<big/>Registration ERROR!!</big> <br/> ['.$db->error.']');
		$_SESSION['_m']="Registration ERROR!!";
		$_SESSION['_t']='d';
	}


	if($result){
		// $_SESSION['id'] = $username;
		// setcookie('frm', $frm, time() + (86400 * 30), "/"); // 86400 = 1 day
		$_SESSION['_m']="Registered Successfully.";
		$_SESSION['_mb']="You can login after approval.<br/>Check your email for more details.";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign(window.location.href);</script>";
	}

	else{
		$_SESSION['_m']="Registration Failed!";
		$_SESSION['_t']='d';
	}

$db->close();

}
?>