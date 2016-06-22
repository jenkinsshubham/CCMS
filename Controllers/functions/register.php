<?php
require CONTROLLERS.'lib/PasswordHash.php';
if (isset($_POST['register'])) {

// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;

// Are we debugging this code?  If enabled, OK to leak server setup details.
$debug = TRUE;

function fail($pub, $pvt = '')
{
	global $debug;
	$msg = $pub;
	if ($debug && $pvt !== '')
		$msg .= ": $pvt";
/* The $pvt debugging messages may contain characters that would need to be
 * quoted if we were producing HTML output, like we would be in a real app,
 * but we're using text/plain here.  Also, $debug is meant to be disabled on
 * a "production install" to avoid leaking server setup details. */
	exit("An error occurred ($msg).\n");
}





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

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
$hash = $hasher->HashPassword($password);
if (strlen($hash) < 6)
	fail('Failed to hash new password');
unset($hasher);



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