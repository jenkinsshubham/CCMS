<?php 
if(isset($_POST['submit'])){

	$no1=$db->real_escape_string($_POST['noofsubjects']);
	$no2=$db->real_escape_string($_POST['nooflabs']);

	$sub1=$db->real_escape_string($_POST['subject1']);
	$sub2=$db->real_escape_string($_POST['subject2']);
	$sub3=$db->real_escape_string($_POST['subject3']);

	$lab1=$db->real_escape_string($_POST['lab1']);
	$lab2=$db->real_escape_string($_POST['lab2']);
	$lab3=$db->real_escape_string($_POST['lab3']);
	$lab4=$db->real_escape_string($_POST['lab4']);

	$find_row=$db->query("SELECT * FROM `subject_entry` WHERE fid='$fid'");
		$rows=$find_row->num_rows;
		if($rows==0){
		$qr="INSERT INTO `subject_entry` VALUES 
			 ('$fid', $no1, $no2, '$sub1', '$sub2','$sub3', '$lab1', '$lab2','$lab3', '$lab4');"; 
		$result=$db->query($qr);
		if ($result) {
		echo "<script>alert('Success Added!');</script>";
		}
		}
		else
		{
			$qr1="UPDATE `subject_entry` 
					SET `noofsubjects` = '$no1', 	
					`nooflabs` = '$no2', 	
					`subject1` = '$sub1', 
					`subject2` = '$sub2', 
					`subject3` = '$sub3', 
					`lab1` = '$lab1', 
					`lab2` = '$lab2', 
					`lab3` = '$lab3', 
					`lab4` = '$lab4' 
					WHERE `subject_entry`.`fid` = '$fid' ";
				$result=$db->query($qr1);
				if ($result) {
				echo "<script>alert('Successfully Updated!');</script>";
				}
		}   
	$db->close();
	
	header("Location: ".BASEPATH);
}
?>