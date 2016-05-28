<?php
if (isset($_POST['go'])) {
	$name = $db->real_escape_string($_POST['name']);
	$sex = $db->real_escape_string($_POST['sex']);
	$email =$db->real_escape_string($_POST['email']);
	$br =$db->real_escape_string($_POST['br']);
	$mob =$db->real_escape_string($_POST['mob']);

	$__p=BASEPATH."page/profile";
	if ($frm=='s'){
		$sem =$db->real_escape_string($_POST['sem']);
		$dob =$db->real_escape_string($_POST['dob']);
		$sec =$db->real_escape_string($_POST['sec']);
		$address = $db->real_escape_string($_POST['address']);
		$f_mob =$db->real_escape_string($_POST['f_mob']);
	}

		$update = ($frm=='s') ? "UPDATE `log_s` " : " UPDATE `log_f` ";
		$update.=" SET `name` = '$name', `email` = '$email', `br` = '$br', `mob` = '$mob', `sex`='$sex'  ";
		$update .= ($frm=='s') ? ", `sec` = '$sec', `dob` = '$dob', `sem` = '$sem', `address` = '$address', `f_mob` = '$f_mob'" : "";
		$update .= " WHERE `username` = '$username'";
	if($db->query($update)) {
		$_SESSION['_m']="Profile Updated Successfully.";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign(window.location.href);</script>";
 }
 else{ 
	 	// echo "<script>alert(\"Profile Update Failed!-$db->error\") </script>";
	 	$_SESSION['_m']="Profile Update Failed!";
		$_SESSION['_t']='d';
	}

}
?>