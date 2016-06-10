<?php include CONTROLLERS.'functions/upload_pic.php';?>
<link rel="stylesheet" type="text/css" href="<?php echo STYLERS ;?>css/upload_pic.css"/>
	<div class="panel panel-body">
		<h1 id="pp">Update Profile Picture</h1><br/>
		<hr>
		<form id="uploadimage" method="post" enctype="multipart/form-data" action="">
			<div id="image_preview">
				<img id="previewing" 
					src="<?php echo "../User_Uploads/profile/".$username."-".$frm; ?>" 
					height='200' width='200' alter='Preview'/>
			</div>
			<hr>
			<div id="selectImage">
				<label>Select Your Image</label><br/>
				<input type="file" name="file" id="file" required />
				<input type="submit" value="Upload" class="btn btn-primary pull-right" />
			</div>
		</form>
	</div>