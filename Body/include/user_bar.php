<?php
session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM login_info WHERE usn=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<div class='panel panel-info' style='margin:12px'>
               <div class='panel-heading'> <h3 class='panel-title'>My Account</h3> </div>
               <div class='panel-body' style='padding:12px;'>
                 <ul class='nav navbar-nav'>
                  <li><a href='?profile'><span class='glyphicon glyphicon-user' aria-hidden='true'></span>My Profile</a></li>
                  <li><a href='#'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Messages</a></li>
                  <li><a href='?assignments#assignments'>Assignments</a></li>
                  <li><a href='?attendence'>Attendence</a></li>
                  <li><a href='?logout'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Logout</span></a></li>
                </ul>
               </div>
</div>