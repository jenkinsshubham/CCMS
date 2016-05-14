<?php require '../Controllers/functions/add_notice.php'; ?>

<div style="width: 100%" class="panel panel-warning">
	<div class="panel-heading"><h2 class="panel-title">Add Notice</h2 class="panel-title"></div>
	<div class="panel-body">
		<form method="post">
			<input type="text" placeholder="Enter title.." name="title" class="form-control">
			<input type="text" placeholder="Content of the Notice..." name="content" class="form-control">
			<input class="btn btn-warning" type="submit" name="submit" value="Post">
		</form>
	</div>
</div>