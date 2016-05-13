<?php 
require_once 'config.inc.php';
require_once('../Controllers/config/database.php');
require 'include/header.html';

if(isset($_SESSION['id']))  require('include/user_info.php');


?>
<div id='body'>
<div class="main">

<!-- PROFILE --> <?php if(isset($username)&&isset($_GET['profile'])) {echo include('include/Student/profile.php');}?>
<!-- PROFILE EDITOR --> <?php if(isset($username)&&isset($_GET['profile_edit'])) {echo include('include/Student/edit_profile.php');}?>
<!-- ASSIGNMENTS --> <?php if(isset($username)&&isset($_GET['assignments'])) {echo include('include/Student/assignments.php');}?>
<!-- ATTENDENCE --> <?php if(isset($_GET['attendence'])) {echo include('include/Student/attendence.php');}?>
<!-- EVENTS --> <?php if(isset($_GET['events'])) {echo include('include/events.php');}?>
<!-- ASSIGNMENT brwsr --> <?php if(isset($_GET['assignment_browser'])) {echo include('include/assignment_browser.php');}?>


<!-- student status --> <?php if($frm='s'&&isset($username)) {echo include('include/status.php');} ?> 

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
<!-- user bar --> <?php if(isset($username)) {echo include('include/user_bar.php');} ?> 
		<div class="panel panel-info" style="margin:12px">
			<div class="panel-heading"> <h3 class="panel-title">Notice & Updates</h3> </div>
			<div class="panel-body" style="padding:12px;">
	          <iframe height="184" width="100%" src="<?php echo BASEPATH?>Body/include/feeds.php" scrolling="no" marginwidth="0" marginheight="0" vspace="0" hspace="0" frameborder="0"></iframe>
		     </div>
	   </div>

</div>

</div>

<?php
require 'include/footer.html';
?>
