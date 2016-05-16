<?php if ($frm=='f') {
	require '../Controllers/functions/subject_entry.php';
} ?>
<br/>
<div class="panel panel-info">
	<div class="panel-heading"><h2 class="panel-title">Choose Subjects</h2></div>	
	<div class="panel-body">
		<div class="alert alert-success" role="alert">
		  <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
			 Please check the subject code while selecting.
		</div>
		<div class="alert alert-warning" role="alert">
		  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  <span class="sr-only">Note:</span>
		   Note: This option will change all previously selected subjects.
		</div>
		<form method="post" class="form-horizontal" role="form">
			<div class="input-group">
				<span class="input-group-addon">No. of Theory subjects</span>
				<select name="noofsubjects" class="form-control" aria-describedby="basic-addon1">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<span class="input-group-addon">No. of Lab subjects</span>
				<select name="nooflabs" class="form-control" aria-describedby="basic-addon1">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon">Theory 1</span>
				<select name="subject1" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Theory 2</span>
				<select name="subject2" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Theory 3</span>
				<select name="subject3" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon">Lab 1</span>
				<select name="lab1" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Lab 2</span>
				<select name="lab2" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Lab 3</span>
				<select name="lab3" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Lab 4</span>
				<select name="lab4" class="form-control" aria-describedby="basic-addon1">
					<option>Subject 1</option>
					<option>Subject 2</option>
					<option>Subject 3</option>
				</select>
			</div>
			<br/>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
		</form>
	</div>	
</div>