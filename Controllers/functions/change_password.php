<?php 
if (isset($_POST['submit'])) {

$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$tbl="log_".$frm;
$query="update $tbl set password='$hash' where username='$username'";
$result=$db->query($query);
if($result){
	$_SESSION['_m']="Password changed successfully!";
	$_SESSION['_t']='s';
	echo "<script>window.location.assign('".BASEPATH."');</script>";
}
else {
	$_SESSION['_m']="Failed to change Password..!!";
	$_SESSION['_t']='s';
	echo "<script>window.location.assign('".BASEPATH."');</script>";
}

$db->close();

}

?>