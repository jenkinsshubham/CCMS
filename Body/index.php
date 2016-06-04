<?php 

require 'include/header.html';
echo "<br/><br/>";

if(isset($_SESSION['level'])) include "include/Admin/index.php"; 
else {

require_once('../Controllers/functions/feeds.php');

?>
<div id='body' onload="hideSecOnload()">
<div class="main">
<!--  ERROR MESSAGES  --> <?php echo "<br/>"; include CONTROLLERS.'errors/msg.php';?>
<!-- FACULTY INDEX --> <?php if(isset($frm)){ if($frm=='f') {require 'include/Faculty/faculty_index.php';}}; ?>
<!-- PROFILE --> <?php if($selected=='profile') {echo include('include/profile.php');}?>
<!-- PROFILE EDITOR --> <?php if(isset($username)&&$selected=='editProfile') {echo include('include/edit_profile.php');}?>
<!-- ASSIGNMENTS --> <?php if(isset($username)&&isset($_GET['assignments'])) {echo include('include/Student/assignments.php');}?>
<!-- ATTENDENCE --> <?php if(isset($_GET['attendence'])) {echo include('include/Student/attendence.php');}?>
<!-- EVENTS --> <?php if(isset($_GET['events'])) {echo include('include/events.php');}?>
<!-- ASSIGNMENT brwsr --> <?php if(isset($_GET['assignment_browser'])) {echo include('include/assignment_browser.php');}?>


<!-- student status --> <?php if(isset($frm)){if($frm=='s'&&isset($username)&&$selected==null) {echo include('include/status.php');}} ?> 

<!-- SLIDER -->  <?php if(!isset($username)) {echo include('include/slider.php');}?>


<br/>
<br/>


<br/>


Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<br/>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<br/>







</div>

<div class="sidebar-right">
<!-- user bar --> 
					<?php if(isset($username)) {
							if($frm=='s') include('include/user_bar.php'); 
							else if($frm=='f') include('include/Faculty/user_bar.php');
					} ?> 
		<div class="panel panel-info" style="margin:12px">
			<div class="panel-heading"> <h3 class="panel-title">Notice &amp; Updates</h3> </div>
			<div class="panel-body" style="padding:12px;height: 300px;width: 100%;">
	          <?php include("include/feeds.php") ?>
		    </div>
	   </div>

</div>

</div>


<?php if(!isset($username)) { ?>
	<!-- LOGIN BUTTON  -->
	<a href="<?php echo BASEPATH?>login">
	<div class="alogin-button">
		login
	</div>
	</a>

<?php
};
}
require 'include/footer.html';
?>
