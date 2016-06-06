<?php

require '../config/database.php';

	$exam=$db->real_escape_string($_POST['exam']);
	$_sec=$db->real_escape_string($_POST['sec']);
	$_sub=$db->real_escape_string($_POST['sub']);
	$_br=$db->real_escape_string($_POST['br']);
if(isset($_POST['step2'])){

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
			$html ="";
			$html.=  "<tr id='addr0'><td>".$i++."</td>";
			$html.= "<td><input type=\"hidden\" name='usn0' value='".$ra['usn']."'/>".$ra['usn']."</td>";
			$html.= "<td>".$ra['name']."</td>";
			$html.= "<td><input type=\"text\" name='m0' placeholder='Marks' class=\"form-control\"/></td>";
			$html.= "<td><input type=\"text\" name='a0' placeholder='Attendence' class=\"form-control\"/></td>";
			$html.= "</tr><tr id='addr1'></tr>";
		    echo $html;
		}
}


if (isset($_POST['step3'])) {


	$opt="<h4>Report Created Successfully.</h4><p><strong>Subject: </strong>".$_sub."<br/><strong>Branch: </strong>".$_br ."<br/><strong>Section: </strong>".$_sec." <br/>
	        <a href=\"#\">
	                View the Report.</a></p>";
	echo $opt;
	
}

?>