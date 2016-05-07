<?php
require('../Controllers/config/database.php');
//ID
$id = ($_SESSION['id']);

$exam='internal_1';

$sql=" SELECT *";
$sql.=" FROM $exam";
$sql.=" WHERE usn='$id'";

$result=$db->query($sql);

if (!$result) {
	die('There was an error running the query ['.$db->error.']');
}

// FETCHING
$status=$result->fetch_array();	
echo "usn: ".$status['usn']."<br/>"


?>