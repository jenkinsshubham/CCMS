<?php
require '../config/database.php';
	$frm =$db->real_escape_string($_POST['frm']);
	$sql="SELECT username,usn,email FROM log_";
	$sql.=($frm=='f')?'f':'s';
	$sql.=" WHERE ";
if(isset($_POST['username'])){
	$username = $db->real_escape_string($_POST['username']);
	$sql.="username='$username'";
	$result=$db->query($sql);
	$echo=(($result->num_rows)>0)?0:1;
	echo $echo;
}

?>