<?php

if ($selected=='subjectEntry') {
	include 'include/Faculty/subject_entry.php';
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


<div class="popup" data-popup="add_notice">
    <div class="popup-inner">
        <div style="background: #fff;height: 100%;width: 100%;border-radius:8px;padding: 10px;">
            <div>
            	<?php include 'include/Faculty/add_notice.php'; ?>
            </div>
        </div>
        <a class="popup-close" data-popup-close="add_notice" href="#">x</a>
    </div>
</div>