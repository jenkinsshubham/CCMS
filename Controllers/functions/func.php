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


?>
