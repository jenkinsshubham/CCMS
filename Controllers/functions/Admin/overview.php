<?php
$q1="SELECT * FROM log_f WHERE br='$br' AND flag=1";
$q2="SELECT * FROM log_s WHERE br='$br' AND flag=1";
$q3="SELECT * FROM subjects WHERE branch='$br'";
$q4="SELECT name FROM log_admin WHERE level='hod'";
$q5="SELECT name FROM log_admin WHERE level='principal'";
$r1=$db->query($q1);
$r2=$db->query($q2);
$r3=$db->query($q3);
$r4=$db->query($q4);
$r5=$db->query($q5);
$facCount=$r1->num_rows;
$stuCount=$r2->num_rows;
$subCount=$r3->num_rows;
$hodCount=$r4->num_rows;
$pr=$r5->fetch_array();

$_fr=($_facReg)?'ON':'OFF';
$_sr=($_stuReg)?'ON':'OFF';
$_fe=($_facEditProfile)?'':'\'t';
$_fn=($_facNotice)?'':'\'t';
$_se=($_stuEditProfile)?'':'\'t';
$_princi=$pr[0];

?>
