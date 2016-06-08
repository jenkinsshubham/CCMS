<?php

if(isset($_POST['submit'])){

	if($level=='admin'){
		$_s_=$db->real_escape_string($_POST['_s_']);	

			$sfn=(isset($_POST['sfn']))?$db->real_escape_string($_POST['sfn']):SITENAME;	
			$ssn=(isset($_POST['ssn']))?$db->real_escape_string($_POST['ssn']):SHORTNAME;	
			$tl=(isset($_POST['tl']))?$db->real_escape_string($_POST['tl']):TAGLINE;	
			$em=(isset($_POST['em']))?$db->real_escape_string($_POST['em']):EMAIL;	
			$bp=(isset($_POST['bp']))?$db->real_escape_string($_POST['bp']):BASEPATH;

			$facReg=(isset($_POST['facReg']))?$db->real_escape_string($_POST['facReg']):(($_s_!='fp')?$_facReg:0);	
			$facNotice=(isset($_POST['facNotice']))?$db->real_escape_string($_POST['facNotice']):(($_s_!='fp')?$_facNotice:0);	
			$facEditProfile=(isset($_POST['facEditProfile']))?$db->real_escape_string($_POST['facEditProfile']):(($_s_!='fp')?$_facEditProfile:0);
	
			$stuReg=(isset($_POST['stuReg']))?$db->real_escape_string($_POST['stuReg']):(($_s_!='sp')?$_stuReg:0);	
			$stuEditProfile=(isset($_POST['stuEditProfile']))?$db->real_escape_string($_POST['stuEditProfile']):(($_s_!='sp')?$_stuEditProfile:0);
		$file1=CONTROLLERS."config/config.inc.php";
		$fp = fopen("config.inc.php", "w") or die("Unable to open file!");
		$fp1 = fopen($file1, "w") or die("Unable to open file!");
		$txt ="";
		$txt .= "<?php\n";
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
		$txt.="\$_facEditProfile='$facEditProfile';\n";

		$txt.="\$_stuReg='$stuReg';\n";
		$txt.="\$_stuEditProfile='$stuEditProfile';\n";
	
		$txt.="?>\n";
	
		fwrite($fp, $txt);
		fclose($fp);
		fwrite($fp1, $txt);
		fclose($fp1);
		$path=BASEPATH.'page/settings';
		echo "<script>window.location.assign('".$path."');</script>";
		$_SESSION['_m']="SAVED Successfully!!";
		$_SESSION['_t']='s';
	}
}


?>
