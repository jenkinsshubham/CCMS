<?php
if (isset($_POST['submit'])) {
	$id = $db->real_escape_string($_POST['id']);
	$password = $db->real_escape_string($_POST['password']);
	$frm =$db->real_escape_string($_POST['frm']);
	// QUERYING
	$sql="SELECT * FROM log_";
	$sql.= ($frm=='s')?"s":"f";
	$sql.=" WHERE username='$id' OR ";
	$sql.=($frm=='s') ?"usn='$id'":"fid='$id'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}
	if($result->num_rows==0) {
		echo "<script>alert('User not registered!')</script>";
	}
	else {

		// FETCHING
		$row=$result->fetch_array();	
		$logid=$row['username'];
		$flag=$row['flag'];

		if($row['password']==$password){
			if ($flag) {
				$_SESSION['id'] = $logid;
				$_SESSION['frm'] = $frm;
				header("Location: ".BASEPATH);
			}
			else echo "<script>alert('Account not approved!')</script>";
		}
		else{
			?>
			<script>alert('Invalid Password!');</script>
			<?php
		}
	}

}
?>