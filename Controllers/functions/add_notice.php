<?php
if(isset($_POST['submit'])){
	$title=$db->real_escape_string($_POST['title']);
	$content=$db->real_escape_string($_POST['content']);
	$publisher=(!isset($level)) ? $name.' ['.$fid.']' : strtoupper($br.$level);

	$sql="INSERT INTO `notice` ";
	$sql.="(title,content,publisher,time) ";
	$sql.="VALUES('$title','$content','$publisher', CURRENT_TIMESTAMP) ";


	$result=$db->query($sql);

	if (!$result) {
		$_SESSION['_m']="Error while publishing Notice..!";
		$_SESSION['_mb']="Check and try Again.";
		$_SESSION['_t']='d';
		echo "<script>window.location.assign(window.location.href);</script>";
	}


	if($result){
		$_SESSION['_m']="Notice Published successfully.";
		$_SESSION['_mb']="Title: $title<br/>";
		$_SESSION['_mb'].="$content<br/>";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign('".BASEPATH."');</script>";
	}
}
?>
