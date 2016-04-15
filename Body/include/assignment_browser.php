<?php
if(isset($_POST["go"])) {
$br_sec = mysql_real_escape_string($_POST['br'].$_POST['sec']);	
	
$aquery  = "SELECT * FROM assignments ";
$aquery .= "WHERE br_sec = '$br_sec'";
$query .= "ORDER BY date ASC'";
$assignment = mysql_query($aquery);
if (!$assignment) {
		die("Database query failed: " . mysql_error());
	}
}
?>

<br/>
<div  class="panel panel-info" style="width:350px">
 <div class='panel-body' style='padding:12px;'>
 <form method="post">
 <label>Branch: </label>
        <select name="br">
      		<option>Select Branch</option>         
      		<option>CS</option>         
      		<option>MR</option>         
      		<option>AE</option>         
      		<option>ME</option>         
      		<option>NA</option>         
      		<option>EC</option>         
      		<option>EE</option>         
         </select><br/>
  <label>Section: </label> 
  <input type="text" value="<?php if(mysql_fetch_array($assignment)) { echo $row['section'];} ?>" name="sec" required="true"><br/>
  <input type="submit" value="go" name="go">
         
 </form>
 </div>
</div>


<?php
if(mysql_fetch_array($assignment)) {
	include('usr_end/assignments.php');
	
}
?>
