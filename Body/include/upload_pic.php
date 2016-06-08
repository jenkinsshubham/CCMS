<?php include CONTROLLERS.'functions/upload_pic.php';?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo STYLERS ;?>js/upload_pic.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo STYLERS ;?>css/upload_pic.css"/>
	<div class="panel panel-body">
		<h4 id='loading' >loading..</h4>
		<div id="message"></div>
		<h1 id="pp">Update Profile Picture</h1><br/>
		<hr>
		<form id="uploadimage" method="post" enctype="multipart/form-data">
			<div id="image_preview"><img id="previewing" src="<?php echo STYLERS?>/img/noimage.png" /></div>
			<hr>
			<div id="selectImage">
				<label>Select Your Image</label><br/>
				<input type="file" name="file" id="file" required />
				<input type="submit" value="Upload" class="btn btn-primary pull-right" />
			</div>
		</form>
	</div>