<?php 
session_start();
ini_set('display_errors',1); 
 error_reporting(E_ALL);

require_once 'config.inc.php';

if (isset($_SESSION['id'])) {
    header('LOCATION: '.BASEPATH);  
}
 
require('../Controllers/config/database.php');

require('../Controllers/functions/func.php');

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

    <script src="<?php echo STYLERS ?>js/jquery1.11.1.js"></script>
    <script src="<?php echo STYLERS ?>js/bootstrap.min.js"></script>
</head>
<body>
    <center>
    <h1>WELCOME  TO </h1>
    <p> <?php echo SITENAME ?></p>
    <br/> <br/>
    </center> 
<!-- Where all the magic happens -->
<?php if(!isset($_GET['register'])&&!isset($_GET['forgot'])) { require('../Controllers/functions/login.php');?>
<!-- LOGIN FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo"> <?php if (isset($_GET['f']))  echo "Faculty";
                                else echo "Student"; ?> login</div>
        <!-- Main Form -->
        <div class="login-form-1">
        	<center><?php include CONTROLLERS.'errors/msg.php';?></center>
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
                    <?php if(($frm=='f'&&$_facReg)||($frm=='s'&&$_stuReg)){?>
                    <p>new user? <a href="register<?php if (isset($_GET['f']))  echo "/f";
                                else echo "/student"; ?>#register-form">create new account</a></p>
                    <?php }?>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } 
if(($frm=='f'&&$_facReg)||($frm=='s'&&$_stuReg)){
if(isset($_GET['register'])) { require('../Controllers/functions/register.php'); ?>
<!-- REGISTRATION FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo"> <?php if (isset($_GET['f']))  echo "Faculty";
                                else echo "Student"; ?> register</div>
        <!-- Main Form -->
        <div class="login-form-1">
        	<center><?php include CONTROLLERS.'errors/msg.php';?></center>
            <form id="register-form" class="text-left" method="post">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <input type="hidden" name="frm" value="<?php echo $frm ?>"/>
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="What's your Full Name?" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Choose a username..." required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Create a password..." required>
                        </div>
                        <div class="form-group">
                            <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                            <input type="password" class="form-control" name="password_confirm" placeholder="confirm password"  required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="abc@xyz.com">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only"><?php if (isset($_GET['f']))  echo "Faculty ID";
                                else echo "USN"; ?></label>
                            <input type="text" class="form-control" name="<?php if (isset($_GET['f']))  echo "fid";
                                else echo "usn"; ?>" placeholder="<?php if (isset($_GET['f']))  echo "Faculty ID";
                                else echo "USN  (leave blank if you don't have)"; ?>">
                        </div>
                        <div class='form-group'>
                         <select class="form-control" <?= isset($_GET['f']) ? ' name="department"' : 'name="br"';?> required>
                            <option value="">Select <?= isset($_GET['f']) ? ' department' : 'branch';?>...</option>         
                             <?php for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
                            <option value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
                            </option>
                           <?php } ?>   
                         </select>
                         </div>
                        <?php if (isset($_GET['f'])) echo "
                            
                            ";
                        else {?>
                            <div class="form-group">
                            <select class="form-control" name='sem' required>
                                <option value=''>You are in which sem?</option>
                                <?php for ($i=1; $i<9  ; $i++) { echo "
                                    <option value='$i'>$i</option>
                                  " ;} ?>
                            </select> 
                            </div>
                            <div class="form-group">
                            <select class="form-control" name='sec'>
                                <option value='--'>Choose if you know your Section..</option>
                                <?php for ($i=1; $i<7  ; $i++) { echo "
                                <option value='a$i'>A$i</option>
                                " ;} ?>
                                <?php for ($i=1; $i<7  ; $i++) { echo "
                                <option value='b$i'>B$i</option>
                                " ;} ?>
                            </select>
                         </div>
                        <?php ;}?>

                    </div>
                    <button name="register" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="<?php if (isset($_GET['f']))  echo    BASEPATH."/faculty";
                                else echo BASEPATH."login"; ?>#login-form">login here</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } }
if(isset($_GET['forgot'])) { 
    require CONTROLLERS.'functions/forgot.php';?>
<!-- FORGOT PASSWORD FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">forgot password</div>
        <!-- Main Form -->
        <div class="login-form-1">
        	<center><?php include CONTROLLERS.'errors/msg.php';?></center>
            <form method='post' id="forgot-form" class="text-left">
                <div class="etc-login-form">
                    <p>When you fill in your registered email or username, you will be sent instructions on how to reset your password.</p>
                </div>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="fp_email" class="sr-only">Email address</label>
                            <input type="text" class="form-control" id="fp_email" name="id" placeholder="email or username">
                        </div>
                    </div>
                    <button name="submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="<?php if (isset($_GET['f']))  echo    BASEPATH."/faculty";
                                else echo BASEPATH."login"; ?>">login here</a></p>
                    <?php if(($frm=='f'&&$_facReg)||($frm=='s'&&$_stuReg)){?>
                    <p>new user? <a href="register<?php if (isset($_GET['f']))  echo "/f";
                                else echo "/student"; ?>#register-form">create new account</a></p>
                    <?php ;}?>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
<?php } ?>
    
</body>
</html>