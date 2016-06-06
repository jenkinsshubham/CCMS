<?php

require '../config/database.php';

if(isset($_POST['step1'])){
	$exam=$db->real_escape_string($_POST['exam']);
	$_sec=$db->real_escape_string($_POST['sec']);
	$_sub=$db->real_escape_string($_POST['sub']);
	$_br=$db->real_escape_string($_POST['br']);

		$sql="SELECT DISTINCT sem FROM subjects";
		$sql.=" WHERE code='$_sub'";
		$r=$db->query($sql);

		$ra=$r->fetch_array();

	$_sem=$ra['sem'];


		$sql="SELECT name,usn FROM log_s";
		$sql.=" WHERE sem='$_sem'";
		$sql.=" AND br='$_br'";
		$sql.=" AND sec='$_sec'";

			$r=$db->query($sql);
	$i=0;
		while($ra=$r->fetch_array()){
				$html="<div class=\"input-group\">";
				$html.="<span class=\"input-group-addon\">".$ra['usn']."</span>";
	            $html.="<span class=\"input-group-addon\">".$ra['name']."</span>";
		        $html.="<span class=\"input-group-addon\"><input type=\"text\" class=\"form-control\" name='".$i."'></span>";
		        $html.="<span class=\"input-group-addon\"><input type=\"text\" class=\"form-control\" name='".$i."'></span>";
		        $html.="</div>";
		        echo $html;
		}
}

?>