<?php require CONTROLLERS.'functions/change_password.php';?>
<div class="panel panel-default">
	<div class="panel-heading"><h1>Change Password</h1></div>
	<div class="panel-body">
		<form method="POST">
			<div class="input-group">
				<span class="input-group-addon"> Current Password:</span>
				<input class="form-control" type="password" placeholder="Enter your current password..." name="pass">
			</div><br/>
			<div class="input-group">
				<span class="input-group-addon"> New Password:</span>
				<input class="form-control" type="password" placeholder="Enter a strong new password.." name="newpass">
				<input class="form-control" type="password" placeholder="Re-enter new password..." name="">
			</div><br/>
			<input class="btn btn-primary pull-right" type="submit" value="Change password" name="submit">
		</form>
	</div>
</div>
