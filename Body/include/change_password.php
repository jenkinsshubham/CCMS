<?php require CONTROLLERS.'functions/change_password.php';?>
<script type="text/javascript" src="<?php echo STYLERS ?>js/validation.js"></script>
<div class="panel panel-default">
	<div class="panel-heading"><h1>Change Password</h1></div>
	<div class="panel-body">
		<form method="POST">
			<!-- <div class="input-group">
				<span class="input-group-addon"> Current Password:</span>
				<input class="form-control" type="password" placeholder="Enter your current password..." name="pass">
			</div> --><br/>
			<div class="input-group">
				<span class="input-group-addon"> New Password:</span>
				<input class="form-control" type="password" required  
					placeholder="Enter a strong new password.." id="password" name="password">
				<input class="form-control" type="password" required
					 placeholder="Re-enter new password..." id="password_confirm">
			</div><br/>
			<input class="btn btn-primary pull-right" type="submit" value="Change password" name="submit">
		</form>
	</div>
</div>
