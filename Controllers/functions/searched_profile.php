<?php
$_frm=(isset($frm))?($frm=='s'?'f':'s'):'f';
$_username = $db->real_escape_string($_GET['search']);

$sql="SELECT *";
	if ($_frm=='admin') 
		$sql.=" FROM log_admin";
	elseif ($_frm=='s') 
		$sql.=" FROM log_s";
	else 
		$sql.=" FROM log_f";
	$sql.=" WHERE username='$_username'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}

	// FETCHING
	$_row=$result->fetch_array();




// Assigning Variables

	$_name=$_row['name'];
	$_email=$_row['email'];
	$_br=$_row['br'];
	$_img=$_row['img'];
	$__sex=$_row['sex'];
	$_sex = ($__sex=='M') ? "Male" : "Female" ;
	$_mob=$_row['mob'];

	if ($_frm=='s') {
		$_id=$_row['usn'];
		$_usn=$_row['usn'];
		$_sem=$_row['sem'];
		$_sec=$_row['sec'];
		$_dob=$_row['dob'];
		$_cycle=$_row['cycle'];
		$_address=$_row['address'];
		$_f_name=$_row['f_name'];
		$_f_mob=$_row['f_mob'];
		

	} 
	elseif ($_frm=='admin') {
		$_level=$_row['level'];
	}
	else {
		$_id=$_row['fid'];
		$_fid=$_row['fid'];
		$_designation=$_row['designation'];
		$_department=$_row['br'];
		$_branch=$_br;
	}


	// AVATAR
	if(empty($_img)){
		$_avatar = STYLERS.'images/avatars/';
			if ($_frm=='s') {
				$_avatar .= ($__sex=='M') ? 'sm' : 'sf' ;
			}
			else $_avatar .= ($__sex=='M') ? 'fm' : 'ff' ;
			$_avatar.='.png';
		
		}
	else {if(!empty($_img)) $_avatar="../User_Uploads/profile/".$_img;}



?>

?>