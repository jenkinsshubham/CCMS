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
		echo('<big/>Publishing ERROR!!</big> <br/> ['.$db->error.']');
	}


	if($result){
		echo "<script>alert('Notice published successfully!');</script>";
		echo "Notice published successfully!";
	}
}
?>
