<?php

include 'config.inc.php';
require_once(CONTROLLERS.'/config/database.php');
require_once(CONTROLLERS.'/functions/functions.php');
require_once(CONTROLLERS.'/functions/func.php');

$run1=0;
$run2=0;
$run3=0;

$sem="0";
$sec="0";
$internal="0";
$br_="";

if(isset($_GET['sem']))
	$sem_=$db->real_escape_string($_GET['sem']);
	
if(isset($_GET['in'])){
	$internal="internal_";
	$internal.=$db->real_escape_string($_GET['in']);
	}
if(isset($_GET['br']))
	$br_=$db->real_escape_string($_GET['br']);
	
if(isset($_GET['sec']))
	$sec_=$db->real_escape_string($_GET['sec']);

//echo $sem." ". $sec." ". $internal." ". $branch;
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Report | <?php echo SHORTNAME?></title>
<style type="text/css">
<!--
.style2 {
	font-size: 20px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
.style4 {font-size: 18px; font-weight: bold; font-family:Arial, Helvetica, sans-serif; }
.style5 {font-size: 16px; font-weight: bold; font-family:Arial, Helvetica, sans-serif; }
.style6 {font-size:15px;}
@media print {
.noPrint {
    display:none;
}
}
-->
</style>
<script>function printpage()
 {
  window.print();
 }
</script>

</head>

<body>
<?php echo date("d/m/Y");?>
<table width="100%" border="0">
  <tr>
    <th width="1%" nowrap="nowrap">&nbsp;</th>
    <td width="9%"><img src="<?php echo STYLERS?>/images/sit.jpg" width="97" height="117"/></td>
    <td width="80%"><p align="center"><span class="style2"><?php echo strtoupper(SITENAME) ?></span></p>
      <p align="center" class="style6"> [Recognized by AICTE, New Delhi 
     and Affiliated to Visvesvaraya Technological University, Belgaum]<br />
      A.O : Hotel Srinivas Building, GHS Road, Mangalore-575001<br />
     Ph:(0824)-2425966, 2421566, Fax: (0824)-2442766<br />
   E-mail : raghmegh@rediffmail.com, srinivasgroup@rediffmail.com</p>    </td>
    <!--p align="center" class="style5"><u>Department of Computer Science &amp; Engineering </u></p-->
	<td width="5%" valign="top">
		<a onclick="printpage()" "><img class="noPrint" src="<?php echo STYLERS?>images/print_icon.jpg" width="60" height="60"/></a>
	</td>
	<td width="5%" valign="top">
	</td>
  </tr>
</table>
     <p align="center" class="style4">REPORT OF <span style="text-decoration:underline">
     	<?php echo strtoupper($internal); ?></span> ASSESSMENT/ATTENDANCE -<?php echo date('Y');?>
    </p>
	 <p align="center" class="style5">Department of <?php echo fetch_branches('name',$db,$br_);?></p>

<table width="100%" cellspacing="0" border="1">
  <tr>
	<td rowspan="2" align="center">Sl No.</td>
    <td rowspan="2" align="center">USN</td>
    <td rowspan="2" align="center">Name</td>
<?php
$count_sub=0;

$q="SELECT *, COUNT(*) as i FROM `subjects` WHERE branch='$br_' and sem='$sem_'";
$result=$db->query($q);
$r=$result->fetch_array();
$count_sub=$r['i'];

		echo "<strong>Semester : ".$sem_."<br />";
		
		echo " Section : ".$sec_."<br /><br/>";	
		echo getSubject($db,$sem_,$br_)."<br /><br />";
	
	for($i=1;$i<=$count_sub;$i++){
		echo "<td colspan='2' align='center'>".$i."</td>";
	}
	echo "<tr>";
	for($i=1;$i<=$count_sub;$i++){
		echo "<td align='center'>Att(%)</td><td align='center'>M(20)</td>";
	}	
	echo "</tr>";
		$report_query1="SELECT * FROM `log_s` WHERE sem='$sem_' and br='$br_' and sec='$sec_' ORDER BY `usn` ASC";
//		echo $report_query1;
		$report_result=$db->query($report_query1);
		$totalStudent = $report_result->num_rows;
		if($totalStudent > 0){
			$slNum=1;
			while($arr = $report_result->fetch_array()){
				echo "<tr><td>".$slNum++."</td><td>".$arr['usn']."</td><td>".$arr['name']."</td>";
				$report_int="SELECT * FROM $internal WHERE usn='".$arr['usn']."'";
				$int_res=$db->query($report_int);
				$a= $int_res->fetch_array();
				
					for($i=1;$i<=$count_sub;$i++){
						$cm='black';
						$ca='black';
						$mk=$i."m";
						$at=$i."a";
						if($a[$mk] < 12)
							$cm = 'red';
						if($a[$at] < 85)
							$ca = 'red';
							echo "<td  align='center'> <font color=$ca>".$a[$at]."</font></td><td  align='center'> <font color=$cm>".$a[$mk]."</font>  </td>";
					}
				echo "</tr>";
			}
		}
		else
			echo "<tr><td colspan='21' align='center'>No deatails found</td></tr>";
	

?>   
  </table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="167">&nbsp;</td>
    <td width="1736">&nbsp;</td>
    <td width="787">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong>Head of the Department </strong></div></td>
    <td>&nbsp;</td>
    <td><div align="center"><strong>PRINCIPAL</strong></div></td>
  </tr>
  
  <form>
  
</table>
   
<p>&nbsp;</p>
<p>&nbsp;</p>

  
 
</body>

</html>
