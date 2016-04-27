<?php
if (isset($_POST['submit'])) {
	$id = $db->real_escape_string($_POST['id']);
	$password = $db->real_escape_string($_POST['password']);
	$frm =$db->real_escape_string($_POST['frm']);
	// QUERYING
	$sql="SELECT * ";
	if ($frm=='s') 
		$sql.="FROM log_s";
	else 
		$sql.=" FROM log_f";
		$sql.=" WHERE username='$id'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}

	// FETCHING
	$row=$result->fetch_array();	

	if($row['password']==$password){
		$_SESSION['id'] = $id;
		$_COOKIE['frm'] = $frm;
		header("Location: ".BASEPATH);
	}
	else{
		?>
		<script>alert('wrong details');</script>
		<?php
	}

}
?>