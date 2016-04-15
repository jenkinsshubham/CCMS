<?php
$equery  = "SELECT * FROM events ";
$event = mysql_query($equery);
if (!$event) {
		die("Database query failed: " . mysql_error());
	}
?>

<div style='margin:12px'>
 
<h2 id="events">Events</h2><br/>
<?php 
  while ($e_row = mysql_fetch_array($event)) { ?>  
<div  class="panel panel-info">
 <div class='panel-body' style='padding:12px;'>
 <div><b><?php echo $e_row['name'] ?></b></div>
 <div><?php echo $e_row['description'] ?></div><br/>
 </div>
 </div>
 <?php ; } ?> 
</div>