<?php 
session_start();
ini_set('display_errors',1); 
 error_reporting(E_ALL);

require_once 'config.inc.php';

if (isset($_SESSION['id'])) {
    header('LOCATION: '.BASEPATH);  
}
 
require('../Controllers/config/database.php');
require('../Controllers/functions/login.php');
require('../Controllers/functions/func.php');

if (isset($_GET['frm']))  $frm=$db->real_escape_string($_GET['frm']);

?>

