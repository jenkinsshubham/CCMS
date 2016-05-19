<?php

function fetch_branches($demand,$db,$id)
{
	$sqlc="SELECT COUNT(*) FROM branches";
	$sql="SELECT * FROM branches WHERE id='$id'";
	$resultc=$db->query($sqlc);
	$result=$db->query($sql);
	$row=$result->fetch_array();
	$rowc=$resultc->fetch_array();
	if($demand=='count')return $rowc['COUNT(*)'];
	if($demand=='name')return $row['name'];
	if($demand=='code')return $row['code'];
}

function fetch_subjects($demand,$db,$br)
{
	$sqlc="SELECT COUNT(*) FROM subjects";
	$sql="SELECT * FROM subjects";
	$sql.=" WHERE branch='$br' AND cycle='-' ORDER BY ref";
	$resultc=$db->query($sqlc);
	$result=$db->query($sql);
	$row=$result->fetch_array();
	$rowc=$resultc->fetch_array();
	if($demand=='count')return $rowc['COUNT(*)'];
	if($demand=='name')return $row['sname'];
	if($demand=='code')return $row['scode'];
}

 function my_subjects($db,$fid) {
	$html="<option value=''>Select Subject</option>";
	$sql="SELECT * FROM subject_entry WHERE fid='$fid'";
	$qry1 = $db->query($sql);
	$arr = $qry1->fetch_row();	
	// for($i=3;$i<=11;$i++){
	// 	if($arr[$i]!='---'){
	// 		$q = $db->query("SELECT scode, sname FROM subjects WHERE scode='$arr[$i]'");
	// 		$a = $q->num_rows();
	// 		if($a){
	// 			$a = $q->fetch_rows();
	// 			$html.= "<option value='$a[0]'>$a[1]</option>";
	// 		}
	// 		else{
	// 			$q = $db->query("SELECT code, name FROM 1yr_subjects WHERE code='$arr[$i]'");
	// 			$a = $q->num_rows;
	// 			if($a){
	// 				$a = $q->fetch_rows();
	// 				$html.= "<option value='$a[0]'>$a[1]</option>";
	// 			}
	// 		}
	// 	}

	// }
	return $html;
}

?>
