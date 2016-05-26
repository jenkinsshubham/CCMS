<?php
 
if (isset($_POST['submit'])) {
	$username = $db->real_escape_string($_POST['username']);
	$password = $db->real_escape_string($_POST['password']);
	$level =$db->real_escape_string($_POST['level']);
	// QUERYING
	$sql="SELECT username,password";
	$sql.=" FROM log_admin";
	$sql.=" WHERE level='$level'";
	$sql.=" AND username='$username'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error while logging in!');
	}
	if($result->num_rows==0) {
		echo "<script>alert('wrong username!');</script>";
	}
	else {

		// FETCHING
		$row=$result->fetch_array();	
		$u=$row['username'];
		$p=$row['password'];

		if($u==$username){
			if($p==$password){
				$_SESSION['id'] = $username;
				$_SESSION['frm'] = 'admin';
				$_SESSION['level'] = $level;
				header("Location: ".BASEPATH);
			}
			else echo "<script>alert('wrong password for $u')</script>";
		}
	}

}
?>