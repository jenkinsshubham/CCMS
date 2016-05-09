<?php
$br_sec = $row['branch'].$row['section'];
$br_sec = mysql_real_escape_string($br_sec);

$aquery  = "SELECT * FROM assignments ";
$aquery .= "WHERE br_sec = '$br_sec'";
$query .= "ORDER BY date ASC'";
$assignment = mysql_query($aquery);
if (!$assignment) {
		die("Database query failed: " . mysql_error());
	}
?>

<div style='margin:12px'>
 
<h2>Assignments</h2><br/>
<?php if(isset($_GET['assignments'])) {?><p align='right'><a href="?assignment_browser"><u>assignment browser</u></a></p><?php }?>
<span>Showing Assignments for <?php echo $row['branch']."-".$row['section'] ?></span><hr/><br/>
<?php 
  while ($a_row = mysql_fetch_array($assignment)) { ?>  
<div  class="panel panel-info">
 <div class='panel-body' style='padding:12px;'>
 <div><b><?php echo $a_row['title'] ?></b></div>
 <div><em>Published on: <?php echo $a_row['date'] ?></em></div><br/>
 <div><?php echo $a_row['content'] ?></div>
 </div>
 </div>
 <?php ; } ?> 
</div>