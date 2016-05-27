<?php require CONTROLLERS.'functions/add_notice.php'; ?>

<div style="width: 100%" class="panel panel-warning">
	<div class="panel-heading"><h2 class="panel-title" id="aN">Add Notice</h2></div>
	<div class="panel-body">
		<form method="post">
			<input type="text" required placeholder="Enter title.." name="title" class="form-control">
			<textarea style="height: 235px;" class="form-control" name="content" onfocus="clearContents(this);">
				Content of the Notice...
			</textarea>
			<input class="btn btn-warning" type="submit" name="submit" value="Post">
		</form>
	</div>
</div>


<script type="text/javascript">
	function clearContents(element) {
  element.value = '';
}
</script>