<?php
if(isset($_FILES["file"]["type"])){
	$validextensions = array("jpeg", "jpg", "png", "gif");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && in_array($file_extension, $validextensions)) {
		if ($_FILES["file"]["error"] > 0){
			$_SESSION['_m']= "Return Code: ";
			$_SESSION['_mb']= $_FILES["file"]["error"];
			$_SESSION['_t']='d';
		}
		else{
			$up_img=$username."-".$frm;
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "../User_Uploads/profile/".$up_img; // Target path where file is to be stored
			if(move_uploaded_file($sourcePath,$targetPath)) { // Moving Uploaded file
				// UPLOADING [SUCCESS]
				$sql="UPDATE ";
				$sql.="log_";
				$sql.= ($frm=='s')?"s":"f";
				$sql.=" SET `img` = '".$up_img."'";
				$sql.=" WHERE username='$username'";
				$result=$db->query($sql);
				chmod($targetPath, 0766);
				if($result){
					$_SESSION['_m']="Uploaded Successfully!";
					$_SESSION['_t']='s';
					echo "<script>window.location.assign('".BASEPATH."page/profile')</script>";
				}
				else{
					$_SESSION['_m']="Uploaded but, Error in saving to database.";
					$_SESSION['_t']='w';
					echo "<script>window.location.assign(window.location.href)</script>";
				}
			}
			else{
				$_SESSION['_m']="Failed to upload picture.";
				$_SESSION['_t']='d';
				echo "<script>window.location.assign(window.location.href)</script>";
			}
		}
	}
	else{
		$_SESSION['_m']="Invalid file.";
		$_SESSION['_mb']="Please Choose an image.";
		$_SESSION['_t']='d';
		echo "<script>window.location.assign(window.location.href)</script>";
	}
}
?>