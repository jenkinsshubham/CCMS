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

?>
