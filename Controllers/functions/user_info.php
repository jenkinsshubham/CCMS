<?php

if(isset($_SESSION['id']))
{
	$frm =$db->real_escape_string($_COOKIE['frm']);
	$username = $db->real_escape_string($_SESSION['id']);
		
	$sql="SELECT *";
	if ($frm=='s') 
		$sql.=" FROM log_s";
	else 
		$sql.=" FROM log_f";
	$sql.=" WHERE username='$username'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}

	// FETCHING
	$row=$result->fetch_array();




// Assigning Variables

	$name=$row['name'];
	$email=$row['email'];
	$img=$row['img'];
	$mob=$row['mob'];

	if ($frm=='s') {
		$id=$row['usn'];
		$usn=$row['usn'];
		$sem=$row['sem'];
		$br=$row['br'];
		$sec=$row['sec'];
		$cycle=$row['cycle'];
		$address=$row['address'];
		$f_name=$row['f_name'];
		$f_mob=$row['f_mob'];
		

	} else {
		$id=$row['fid'];
		$fid=$row['fid'];
		$designation=$row['designation'];
		$department=$row['department'];
		
		
	}
	

}

?>