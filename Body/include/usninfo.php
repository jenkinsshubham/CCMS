<?php
session_start();
require_once 'include/dbconnect.php';

if(isset($_SESSION['user']))
{
	$usn = mysql_real_escape_string($_SESSION['user']);
	
$query = "SELECT * FROM usn_info ";
$query .= "WHERE usn = '$usn'";
$info = mysql_query($query);

	$row = mysql_fetch_array($info);
}

?>