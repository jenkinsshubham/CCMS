<?php
$sem = mysql_real_escape_string($row['sem']);
$br = mysql_real_escape_string($row['branch']);
$sec = mysql_real_escape_string($row['section']);
$sr = mysql_real_escape_string($row['sr']);
$br_sem_sec_sr = $br.$sem.$sec.$sr;

$aquery  = "SELECT * FROM attendence ";
$aquery .= "WHERE br_sem_sec_sr = '$br_sem_sec_sr'";
$attendence = mysql_query($aquery);
if (!$attendence) {
		die("Database query failed: " . mysql_error());
	}
?>

<div style='margin:12px'>
<?php 
  while ($a_row = mysql_fetch_array($attendence)) { ?>   
<h2>Attendence</h2><br/>
<?php if(isset($_GET['attendence'])) {?><p align='right'><a href="?assignment_browser"><u>attendence</u></a></p><?php }?>
<span>Showing Attendence for: <u><?php echo $a_row['usn']?></u></span><hr/><br/>
<div  class="panel panel-info">
 <div class='panel-body' style='padding:12px;'>
 <div>CLASSES ATTENDED: <b><?php echo $a_row['present'] ?></b> out of <?php echo $a_row['total'] ?></div>
 </div>
</div>
 <?php ; } ?> 
</div>