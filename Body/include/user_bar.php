<?php
require('../Controllers/config/database.php');
$id = $db->real_escape_string($_SESSION['id']);
$frm =$db->real_escape_string($_COOKIE['frm']);
$sql="SELECT * ";
  if ($frm=='s') 
    $sql.="FROM log_s";
  else 
    $sql.=" FROM log_f";
    $sql.=" WHERE username='$id'";
    $result=$db->query($sql);

if (!$result) {
    die('There was an error running the query ['.$db->error.']');
  }
$userRow=$result->fetch_assoc();
?>

<div class='panel panel-info' style='margin:12px'>
               <div class='panel-heading'> <h3 class='panel-title'>My Account</h3> </div>
               <div class='panel-body' style='padding:12px;'>
                 <ul class='nav navbar-nav'>
                  <li><a href='?profile'><span class='glyphicon glyphicon-user' aria-hidden='true'></span>My Profile</a></li>
                  <li><a href='#'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Messages</a></li>
                  <li><a href='?assignments#assignments'>Assignments</a></li>
                  <li><a href='?attendence'>Attendence</a></li>
                  <li><a href='/logout'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Logout</span></a></li>
                </ul>
               </div>
</div>
