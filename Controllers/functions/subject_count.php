<?php

$q="SELECT COUNT(*)";
if ($sem>2) 
	$q.=" FROM `subjects`";
else 
	$q.=" FROM `1yr_subjects`";
$q.=" WHERE br=";
if ($sem>2) 
	$q.="'$br'";
else $q.="'$cycle'";
$q.=" AND sem='$sem'";

$t=$q." AND type='t'";
$l=$q." AND type='l'";

$return_q=$db->query($q);
$return_l=$db->query($l);
$return_t=$db->query($t);


$q_sub=$return_q->fetch_array();
$q_sub=$q_sub['COUNT(*)'];
$t_sub=$return_t->fetch_array();
$t_sub=$t_sub['COUNT(*)'];
$l_sub=$return_l->fetch_array();
$l_sub=$l_sub['COUNT(*)'];

?>