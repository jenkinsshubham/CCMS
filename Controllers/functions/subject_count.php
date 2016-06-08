<?php

$q="SELECT COUNT(*)";
$q.=" FROM `subjects`";
$q.=" WHERE branch='$br'";
$q.=" AND sem='$sem'";
$t=$q." AND type='T'";
$l=$q." AND type='L'";

$return_q=$db->query($q);
$return_l=$db->query($l);
$return_t=$db->query($t);
if(!$return_q||!$return_t||!$return_l) {
	$_SESSION['_m']="Error in Query!!";
	$_SESSION['_t']='d';
}

$q_sub=$return_q->fetch_array();
$q_sub=$q_sub['COUNT(*)'];
$t_sub=$return_t->fetch_array();
$t_sub=$t_sub['COUNT(*)'];
$l_sub=$return_l->fetch_array();
$l_sub=$l_sub['COUNT(*)'];

?>