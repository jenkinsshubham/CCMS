<?php
$sql="SELECT * FROM subjects WHERE branch='$br' ORDER BY sem";
$_sub=$db->query($sql);

if (isset($_POST['delete'])) {
	$sql="";
	foreach ($_POST['id'] as $id) {
		$_id=$db->real_escape_string($id);
		$sql.="DELETE FROM `subjects` WHERE `subjects`.`id`=$_id; ";
	}
	$result=$db->query($sql);
	if ($result) {
		$_SESSION['_m']="Subjects deleted successfully";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign(window.location.href);</script>";
	}
}
?>