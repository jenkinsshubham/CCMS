<?php
if (isset($_POST['add'])) {
		$code=$_POST['code'];
		$name=$_POST['name'];
		$sem=$_POST['sem'];
		$branch=$_POST['branch'];
		$type=$_POST['type'];
		$ref=$_POST['ref'];
		$sname=$_POST['sname'];
		$ele=(isset($_POST['ele']))?1:0;

	$sql="INSERT INTO `subjects`(code,name,sname,sem,branch,type,ref,elective)";
	$sql.=" VALUES('$code','$name','$sname','$sem','$branch','$type','$ref','$ele')";
	$result=$db->query($sql);
	if ($result) {
		$_SESSION['_m']="Subject added successfully.";
		$_SESSION['_mb']="Name: $name<br/>";
		$_SESSION['_mb'].="Code: $code<br/>";
		$_SESSION['_mb'].="Branch: $branch - $sem sem<br/>";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign('".BASEPATH."');</script>";
	}
	else{
		$_SESSION['_m']="Error while adding subject..!";
		$_SESSION['_mb']="Check and try Again.";
		$_SESSION['_t']='d';
		echo "<script>window.location.assign(window.location.href);</script>";
	}

}