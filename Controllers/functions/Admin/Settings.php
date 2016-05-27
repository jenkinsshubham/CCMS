<?php

if(isset($_POST['submit'])){

	if($level=='admin'){
		$sfn=$db->real_escape_string($_POST['sfn']);	
		$ssn=$db->real_escape_string($_POST['ssn']);	
		$tl=$db->real_escape_string($_POST['tl']);	
		$em=$db->real_escape_string($_POST['em']);	
		$bp=$db->real_escape_string($_POST['bp']);	

		$facReg=(isset($_POST['facReg']))?$db->real_escape_string($_POST['facReg']):0;	
		$facNotice=(isset($_POST['facNotice']))?$db->real_escape_string($_POST['facNotice']):0;	
		$stuReg=(isset($_POST['stuReg']))?$db->real_escape_string($_POST['stuReg']):0;	
		$stuEditProfile=(isset($_POST['stuEditProfile']))?$db->real_escape_string($_POST['stuEditProfile']):0;	
	
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

		$txt.="//SWITCHES\n";
		$txt.="\$_facReg='$facReg';\n";
		$txt.="\$_facNotice='$facNotice';\n";
		$txt.="\$_stuReg='$stuReg';\n";
		$txt.="\$_stuEditProfile='$stuEditProfile';\n";
	
		$txt.="?>\n";
	
		fwrite($fp, $txt);
		fclose($fp);
		echo "<script>alert('Successfully SAVED!!');window.location.assign(window.location.href);</script>";
	}
}


?>
