<?php
$settings = (isset($_GET['settings'])) ? urlencode($_GET['settings']) : null ;
require CONTROLLERS.'functions/approve_users.php';

?>

<div class="container" style="margin-left: 0px">
    <div class="row profile">
		<div class="col-md-3">
			<?php include 'include/Admin/SideMenu.php' ?>
		</div>
		<br/>
		<div class="col-md-9">
            <div class="profile-content">
            <!-- Error Message -->
            <?php include CONTROLLERS.'errors/msg.php';?>
            
			  <?php
				// PAGES
			  	if($selected==null) { 
			  	 	include('include/Admin/overview.php');
			  	}
			  	if($selected=='fetchReport'||$selected=='report') { 
			  	 	include('include/fetch_report.php');
			  	}
				if ($selected=='writeNotice') {
					include 'include/add_notice.php';
				}
				if ($selected=='settings') {
					include 'include/Admin/Settings.php';
				}
				if ($selected=='viewNotice') {
					include 'include/all_notice.php#vN';
				}
				if ($selected=='addSubject') {
					include 'include/Admin/add_subject.php';
				}
				if (($selected=='approveS')||($selected=='approveF')) {
					include 'include/Admin/approve_users.php';
				}
			  // SETTINGS
				if ($settings=='site') {
					include 'include/Admin/Settings>site.php';
				}
				if ($settings=='url') {
					include 'include/Admin/Settings>url.php';
				}
				if ($settings=='facultyP') {
					include 'include/Admin/Settings>facP.php';
				}
				if ($settings=='studentP') {
					include 'include/Admin/Settings>stuP.php';
				}

			  ?>


            </div>
		</div>
	</div>
</div>