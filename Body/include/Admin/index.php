<?php
$selected = (isset($_GET['page'])) ? urlencode($_GET['page']) : null ;
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
				if ($selected=='writeNotice') {
					include 'include/add_notice.php';
				}
				if ($selected=='settings') {
					include 'include/Admin/Settings.php';
				}
				if ($selected=='viewNotice') {
					include 'include/all_notice.php#vN';
				}
				if (($selected=='approveS')||($selected=='approveF')) {
					include 'include/Admin/approve_users.php';
				}

			  ?>


            </div>
		</div>
	</div>
</div>