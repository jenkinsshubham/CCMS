<?php 
if (isset($_POST['submit'])) {
require CONTROLLERS.'lib/PasswordHash.php';	
	// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;

// Are we debugging this code?  If enabled, OK to leak server setup details.
$debug = TRUE;

function fail($pub, $pvt = '')
{
	global $debug;
	$msg = $pub;
	if ($debug && $pvt !== '')
		$msg .= ": $pvt";
/* The $pvt debugging messages may contain characters that would need to be
 * quoted if we were producing HTML output, like we would be in a real app,
 * but we're using text/plain here.  Also, $debug is meant to be disabled on
 * a "production install" to avoid leaking server setup details. */
	exit("An error occurred ($msg).\n");
}
$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
function get_post_var($var)
{
	$val = $_POST[$var];
	if (get_magic_quotes_gpc())
		$val = stripslashes($val);
	return $val;
}

$pass = get_post_var('pass');

$newpass = get_post_var('newpass');
$hash = $hasher->HashPassword($newpass);
if (strlen($hash) < 6)
			fail('Failed to hash new password');
		unset($hasher);
$tbl="log_".$frm;
$query="update $tbl set password='$hash' where username='$username'";
$result=$db->query($query);
if($result){
	$_SESSION['_m']="Password changed successfully!";
	$_SESSION['_t']='s';
	echo "<script>window.location.assign('".BASEPATH."');</script>";
}
else {
	$_SESSION['_m']="Failed to change Password..!!";
	$_SESSION['_t']='s';
	echo "<script>window.location.assign('".BASEPATH."');</script>";
}

$db->close();

}

?>