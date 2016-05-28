<?php 
session_start();
ini_set('display_errors',1); 
 error_reporting(E_ALL);

require_once 'config.inc.php';
require(CONTROLLERS.'config/database.php');
require(CONTROLLERS.'functions/admin_login.php');

$level=$_GET['level'];

if (isset($_SESSION['level'])) {
    echo "<big>Already logged in - $level</big>"  ;
}
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
        <meta charset="utf-8">
        <title><?php echo SHORTNAME." | ".$level ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo STYLERS ?>css/bootstrap.min.css" rel="stylesheet">
     
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="<?php echo STYLERS ?>css/admin_login.css" rel="stylesheet" type="text/css">

    <script src="<?php echo STYLERS ?>js/jquery1.11.1.js"></script>
    <script src="<?php echo STYLERS ?>js/bootstrap.min.js"></script>

</head>
<body>
	<center>
    <h1>WELCOME  TO </h1>
    <h4> <?php echo SITENAME ?></h4>
    <br/> <br/>
    </center> 

    <div class="container">
        <div class="card card-container">
            <h2><?php echo strtoupper($level) ?> LOGIN</h2>
            <p id="profile-name" class="profile-name-card"></p>
            <?php include CONTROLLERS.'errors/msg.php';?>
            <form class="form-signin" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" placeholder="username" name="username" required autofocus>
                <input type="hidden" name="level" value="<?php echo $level ?>" />
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember" /> Remember me
                    </label>
                </div>
                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" name="submit" type="submit" value="Sign in" />
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
