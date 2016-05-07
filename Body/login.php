<?php 
session_start();
ini_set('display_errors',1); 
 error_reporting(E_ALL);


if (isset($_SESSION['id'])) {
	header('LOCATION: /sitn');	
}
 
require_once 'config.inc.php';
require('../Controllers/config/database.php');
require('../Controllers/functions/login.php');

if (isset($_GET['f']))  $frm='f';
else $frm="s"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title><?php echo SHORTNAME ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo STYLERS ?>css/bootstrap.min.css" rel="stylesheet">
     
    <link rel="stylesheet" href="<?php echo STYLERS ?>css/font-awesome.min.css">
    <link href='<?php echo STYLERS ?>css/varela.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="<?php echo STYLERS ?>css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center>
    <h1>WELCOME  TO </h1>
    <p> <?php echo SITENAME ?></p>
    <br/> <br/>
    </center> 

<!-- Where all the magic happens -->
<?php if(!isset($_GET['register'])&&!isset($_GET['forgot'])) { ?>
<!-- LOGIN FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo"> <?php if (isset($_GET['f']))  echo "Faculty";
                                else echo "Student"; ?> login</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="lg_username" name="id" placeholder="username or <?php 
                                if (isset($_GET['f']))  printf("FID");
                                else echo "USN"; ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password"required>
                            <input type="hidden" name="frm" value="<?php echo $frm ?>"/>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>forgot your password? <a href="forgot<?php if (isset($_GET['f']))  echo "/f";
                                else echo "/student"; ?>#forgot-form">click here</a></p>
                    <p>new user? <a href="register<?php if (isset($_GET['f']))  echo "/f";
                                else echo "/student"; ?>#register-form">create new account</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } 
if(isset($_GET['register'])) { ?>
<!-- REGISTRATION FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo"> <?php if (isset($_GET['f']))  echo "Faculty";
                                else echo "Student"; ?> register</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <input type="hidden" name="frm" value="<?php echo $frm ?>"/>
                            <label for="reg_username" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="reg_username" name="name" placeholder="Full Name" required autofocus>
                        </div>
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="cycle" required>
                                <option value="Cycle">--Cycle--</option>
                                <option value="physics">Physics</option>
                                <option value="chemistry">Chemistry</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="section" required>
                                <option value="a1">a1</option>
                                <option value="a2">a2</option>
                                <option value="a3">a3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reg_email" class="sr-only">roll no.</label>
                            <input type="number" class="form-control" id="reg_roll" name="roll" placeholder="Roll no." required>
                        </div>
                        <div class="form-group">
                            <label for="reg_email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="reg_email" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="reg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="reg_password" name="password" placeholder="password"  required>
                        </div>
                        <div class="form-group">
                            <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                            <input type="password" class="form-control" id="reg_password_confirm" name="password_confirm" placeholder="confirm password"  required>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="<?php if (isset($_GET['f']))  echo    BASEPATH."/faculty";
                                else echo BASEPATH."login"; ?>#login-form">login here</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } 
if(isset($_GET['forgot'])) { ?>
<!-- FORGOT PASSWORD FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">forgot password</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="forgot-form" class="text-left">
                <div class="etc-login-form">
                    <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
                </div>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="fp_email" class="sr-only">Email address</label>
                            <input type="hidden" name="frm" value="<?php echo $frm ?>"/>
                            <input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
                        </div>
                    </div>
                    <button name="submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="<?php if (isset($_GET['f']))  echo    BASEPATH."/faculty";
                                else echo BASEPATH."login"; ?>">login here</a></p>
                    <p>new user? <a href="register<?php if (isset($_GET['f']))  echo "/f";
                                else echo "/student"; ?>#register-form">create new account</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } ?>
    
</body>
</html>