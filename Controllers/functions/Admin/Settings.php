<?php

if(isset($_POST['submit'])){

	if($level=='admin'){
		$sfn=$db->real_escape_string($_POST['sfn']);	
		$ssn=$db->real_escape_string($_POST['ssn']);	
		$tl=$db->real_escape_string($_POST['tl']);	
		$em=$db->real_escape_string($_POST['em']);	
		$bp=$db->real_escape_string($_POST['bp']);	
	
		$fp = fopen("config.inc.php", "w") or die("Unable to open file!");
		$txt = "<?php\n";
		$txt.="//Generated From admin settings.\n";
		$txt .= "define('SITENAME', '$sfn');\n";
		$txt .= "define('SHORTNAME', '$ssn');\n";
		$txt .= "define('TAGLINE', '$tl');\n";
		$txt .= "define('EMAIL', '$em');\n";
	
	
		$txt.="// site constants\n";
		$txt.="define('BASEPATH', '$bp');\n";
		$txt.="define('STYLERS', BASEPATH.'Stylers/');\n";
		$txt.="define('CONTROLLERS', '../Controllers/');\n";
		$txt.="define('BODY', BASEPATH.'Body/');\n";
	
		$txt.="?>\n";
	
		fwrite($fp, $txt);
		fclose($fp);
		echo "<script>alert('Successfully SAVED!!');</script>";
	}
}


?>
