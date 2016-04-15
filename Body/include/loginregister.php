<?php
session_start();
require_once 'controllers/config/database.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: public.php");
}



// Registration form
 if(isset($_GET['register'])) {
	
if(isset($_POST['btn-continue']))
{
 $usn = mysqli_real_escape_string($_POST['usn']);
 $password = md5(mysqli_real_escape_string($_POST['password']));
 
 if(mysqli_query("INSERT INTO login_info(usn,Password) VALUES('$usn','$password')"))
 {
 	$expire = time() + (60*10);
 	setcookie('usn', $usn, $expire);
   header("Location: public.php?register#details");
        
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
} 	
 	
	?>
<form class='form-signin' method='post'>
        <h2 class='form-signin-heading'>Register</h2><hr/>
        <input type='text' name='usn'  class='form-control' placeholder='Enter ' required autofocus>
        <input type='password' name='password' class='form-control' placeholder='Password' required>
        <div class='checkbox'>
         
        </div>
        <button class='btn btn-lg btn-primary btn-block' type='submit' name='btn-continue'>Continue</button>
      </form><hr/>
      <p align='center'><a href='?signin'><span style='color:black'>Already Registered?</span></a>
 <?php
}
else {
	if(isset($_POST['btn-login']))
{
 $usn = mysqli_real_escape_string($_POST['usn']);
 $password = mysqli_real_escape_string($_POST['password']);
 $res=mysqli_query("SELECT * FROM login_info WHERE usn='$usn'");
 $row=mysqli_fetch_array($res);
 if($row['Password']==md5($password))
 {
  $_SESSION['user'] = $_POST['usn'];
  header("Location: body/index.php");
 }
 else
 {
  ?>
        <script>alert('Invalid Details.');</script>
        <?php
 }
 
} 	
?>	
	 <form class='form-signin' method='post'>
        <h2 class='form-signin-heading'>Login</h2><hr/>
        <input type='text' name='usn' class='form-control' placeholder='Enter ' required autofocus>
        <input type='password' name='password' class='form-control' placeholder='Password' required>
        <button class='btn btn-lg btn-primary btn-block' type='submit'name='btn-login'>Sign in</button>
      </form><hr/>
      <p align='center'><a href='?register'><span style='color:blue'>Not Registered?</span></a>
  <?php
}
?>