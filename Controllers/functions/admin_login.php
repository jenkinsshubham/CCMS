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
		$_SESSION['_m']="Invalid username!";
		$_SESSION['_t']="w";
	}
	else {

		// FETCHING
		$row=$result->fetch_array();	
		$u=$row['username'];
		$hash=$row['password'];
		$_ls=password_verify($password,$hash)?1:0;

		if($u==$username){
			if($_ls){
				$_SESSION['id'] = $username;
				$_SESSION['frm'] = 'admin';
				$_SESSION['level'] = $level;
				header("Location: ".BASEPATH);
			}
			else{ 
				$_SESSION['_m']="Wrong password for $u";
				$_SESSION['_t']='d';
			}
		}
	}

}
?>