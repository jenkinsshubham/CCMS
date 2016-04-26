<?php
$db = new mysqli('localhost', 'sitn', 'sitn', 'sit_main');

if($db -> connect_errno > 0) {
    die('Unable to connect to database [' . $db -> connect_error . ']');
}
?>