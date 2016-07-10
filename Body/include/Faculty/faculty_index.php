<?php

if ($selected=='subjectEntry') {
    include 'include/Faculty/subject_entry.php';
}
if ($selected=='mySubjects'||$selected==null) {
	include 'include/Faculty/my_subjects.php';
}
if ($selected=='createReport') {
	include 'include/Faculty/create_report.php';
}
if ($selected=='writeNotice') {

    if($_facNotice) include 'include/add_notice.php';
    else{
    	$_SESSION['_m']="Permission Denied";
    	$_SESSION['_mb']="Posting Notice is switched off by admin!";
    	$_SESSION['_t']='w';
    }
}



?>
