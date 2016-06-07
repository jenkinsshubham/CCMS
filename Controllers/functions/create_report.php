<?php
session_start();
require '../config/database.php';
require '../config/config.inc.php';

	$exam=$db->real_escape_string($_POST['exam']);
	$_sec=$db->real_escape_string($_POST['sec']);
	$_sub=$db->real_escape_string($_POST['sub']);
	$_br=$db->real_escape_string($_POST['br']);

		$sql="SELECT DISTINCT sem,ref FROM subjects";
		$sql.=" WHERE code='$_sub'";
		$r=$db->query($sql);

		$ra=$r->fetch_array();

	$_sem=$ra['sem'];
	$_ref=$ra['ref'];


		$sql="SELECT DISTINCT name,usn FROM log_s";
		$sql.=" WHERE sem='$_sem'";
		$sql.=" AND br='$_br'";
		$sql.=" AND sec='$_sec'";
		$sql.=" ORDER BY usn";

			$r=$db->query($sql);
	$i=1;
		while($ra=$r->fetch_array()){
			if(isset($_POST['step2'])){

			$html ="";
			$html.=  "<tr id='addr0'><td>".$i++."</td>";
			$html.= "<td><input type=\"hidden\" name='usn[]' value='".$ra['usn']."'/>".$ra['usn']."</td>";
			$html.= "<td>".$ra['name']."</td>";
			$html.= "<td><input type=\"text\" name='m[]' placeholder='Marks' class=\"form-control\"/></td>";
			$html.= "<td><input type=\"text\" name='a[]' placeholder='Attendence' class=\"form-control\"/></td>";
			$html.= "</tr><tr id='addr1'></tr>";
		    echo $html;
			}
		}



if (isset($_POST['submit'])) {
	
	$exam=($_POST['exam']);
	$usn_set=$_POST['usn'];
	$mark=($_POST['m']);
	$att=($_POST['a']);

	$i=0;
	 	$m=$_ref.'m';
	 	$a=$_ref.'a';
	foreach ($usn_set as $usn) {

		$sql="INSERT INTO internal_".$exam;
		$sql.=" (`usn`, `$m`, `$a`)";
		$sql.=" VALUES ('$usn', '$mark[$i]', '$att[$i]')";

		$res=$db->query($sql);
		$i++;

		
	}


		$_SESSION['_m']="Report Created Successfully.";
		$_SESSION['_mb']="<strong>INTERNAL $exam</strong><br/>
							<strong>Subject: </strong>".$_sub."<br/>
							<strong>Branch: </strong>".$_br ."<br/>
							<strong>Section: </strong>".$_sec." <br/><a href=\"#\">
			                View the Report.</a>";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign('".BASEPATH."');</script>";
	
}

?>