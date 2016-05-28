<?php
if(isset($_SESSION['_m'])){
	echo $_SESSION["_m"]; // Or show the box, or whatever
	$_SESSION["_m"] = null; // Clean up
}
?>
