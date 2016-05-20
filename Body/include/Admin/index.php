<?php


?>

<div class="container" style="margin-left: 0px">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo $avatar;?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $name;?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $br." ".$level;?>
					</div>
					<div class="dropdown">
					  	<a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Account
					    <span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="#">Edit profile</a></li>
					    <li><a href="#">Settings</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="logout">Logout</a></li>
					  </ul>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav" style="padding-left: 10px">
						<li class="active">
							<a href="<?php echo BASEPATH;?>">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-stats"></i>
							Report </a>
						</li>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>NOTICE</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li>
								<a href="#">
								Write <i class="glyphicon glyphicon-edit"></i> </a>
							</li>
							<li>
								<a href="#">
								View Notices</a>
							</li>
							</ul>
						</li>
						<?php if($level=='hod'){?>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>FACULTY</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li>
								<a href="#">
								Registrations <span class="label label-danger">12</span></a>
							</li>
							<li>
								<a href="#">
								All Faculties</a>
							</li>
							</ul>
						</li>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>STUDENT</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li>
								<a href="#">
								Registrations <span class="label label-danger">165</span></a>
							</li>
							<li>
								<a href="#">
								All Students</a>
							</li>
							</ul>
						</li>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>DEPARTMENT</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li>
								<a href="#">
								Add Subject</a>
							</li>
							<li>
								<a href="#">
								View Subjects</a>
							</li>
							</ul>
						</li>
						<?php }?>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<br/>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
</div>