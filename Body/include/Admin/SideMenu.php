			<div class="profile-sidebar">
				<?php if($selected==null){?>
				<div class="profile-userpic">
					<img src="<?php echo $avatar;?>" class="img-responsive" alt="">
				</div>
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
				<?php }?>
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
						<li <?php if(!isset($_GET['page'])){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH;?>">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<?php if($level=='admin'){?>
						<li <?php if($selected=='settings'){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH?>page/settings">
							<i class="glyphicon glyphicon-cog"></i>
							Settings </a>
						</li>
						<li <?php if($selected=='authorities'){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH?>page/authorities">
							<i class="glyphicon glyphicon-user"></i>
							Authorities </a>
						</li>
						<?php }
						if($level!='admin'){?>
						<li <?php if($selected=='report'){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH ?>page/report">
							<i class="glyphicon glyphicon-stats"></i>
							Report </a>
						</li>
						<?php }?>
						<li <?php if($selected=='writeNotice'){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH ?>page/writeNotice#aN">
							<i class="glyphicon glyphicon-edit"></i> Write Notice </a>
						</li>
						<?php if($level=='hod'){?>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>FACULTY</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li <?php if($selected=='approveF'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/approveF#approve">
								Registrations <span class="label label-danger"><?php echo $nf ;?></span></a>
							</li>
							<li <?php if($selected=='allFaculties'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/allFaculties#aF">
								All Faculties</a>
							</li>
							</ul>
						</li>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>STUDENT</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li <?php if($selected=='approveS'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/approveS#approve">
								Registrations <span class="label label-danger"><?php echo $ns ;?></span></a>
							</li>
							<li <?php if($selected=='allStudents'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/allStudents#aF">
								All Students</a>
							</li>
							</ul>
						</li>
						<li>
							<i class="glyphicon glyphicon-user"> </i>
	                    		<small><b>DEPARTMENT</b></small>
	               			<ul class="nav nav-pills nav-stacked">
							<li <?php if($selected=='addSubject'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/addSubject#aS">
								Add Subject</a>
							</li>
							<li <?php if($selected=='viewSubjects'){ echo "class='active'"; }?>>
								<a href="<?php echo BASEPATH ?>page/viewSubjects#vS">
								View Subjects</a>
							</li>
							</ul>
						</li>
						<?php }?>
						<li <?php if($selected=='help'){ echo "class='active'"; }?>>
							<a href="<?php echo BASEPATH ?>page/help#help">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>