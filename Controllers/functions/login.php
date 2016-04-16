<?php
session_start();
require_once CONTROLLERS.'config/database.php';

if (isset($_POST['submit'])){
	$id = mysql_real_escape_string($_POST['id']);
	$password = mysql_real_escape_string($_POST['password']);
	$res=mysql_query("SELECT * FROM register
	if (isset($_POST['f'])){$res.=_f }
	else{$res.=_s }
	$res.=WHERE username='$id'");
	$row=mysql_fetch_array($res);
	if($row['password']==md5($password)){
		$_SESSION['user'] = $_POST['id'];
		header("Location: /index");
	}
	else{
		?>
		<script>alert('wrong details');</script>
		<?php
	}
}


?>