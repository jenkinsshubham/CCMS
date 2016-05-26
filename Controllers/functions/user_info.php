<?php

$frm =$db->real_escape_string($_SESSION['frm']);
if(isset($_SESSION['id']))
{
	$username = $db->real_escape_string($_SESSION['id']);
		
	$sql="SELECT *";
	if ($frm=='admin') 
		$sql.=" FROM log_admin";
	elseif ($frm=='s') 
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
	$br=$row['br'];
	$img=$row['img'];
	$_sex=$row['sex'];
	$sex = ($_sex=='M') ? "Male" : "Female" ;
	$mob=$row['mob'];

	if ($frm=='s') {
		$id=$row['usn'];
		$usn=$row['usn'];
		$sem=$row['sem'];
		$sec=$row['sec'];
		$dob=$row['dob'];
		$cycle=$row['cycle'];
		$address=$row['address'];
		$f_name=$row['f_name'];
		$f_mob=$row['f_mob'];
		

	} 
	elseif ($frm=='admin') {
		$level=$row['level'];
	}
	else {
		$id=$row['fid'];
		$fid=$row['fid'];
		$designation=$row['designation'];
		$department=$row['br'];
		$branch=$br;
	}


	// AVATAR
	$avatar = STYLERS.'images/avatars/';
	if ($frm=='s') {
		$avatar .= ($_sex=='M') ? 'sm' : 'sf' ;
	}
	else $avatar .= ($_sex=='M') ? 'fm' : 'ff' ;
	$avatar.='.png';

}

?>