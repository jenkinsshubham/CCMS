<?php
if (isset($_GET['subject_entry'])) {
	include 'include/Faculty/subject_entry.php';
}
echo "Welcome ".$fid;
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