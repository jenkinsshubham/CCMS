<?php

?>
<br/>
<div class="panel panel-info">
	<div class="panel-heading"><h2 class="panel-title">ADD SUBJECT</h2></div> 
	<div class="panel-body">
		<form method="post">
		<div class="input-group">
	        <span class="input-group-addon">Subject code</span>
	        <input class="form-control" type="text" name="code" placeholder="code">
	        <span class="input-group-addon">Subject name</span>
	        <input class="form-control" type="text" name="name" placeholder="name">
        </div><br/>
		<div class="input-group">
	        <span class="input-group-addon">Semester</span>
	        <select class="form-control" name="sem">
	        	<option>--sem--</option>
	        	<option value="1">I</option>
	        	<option value="2">II</option>
	        	<option value="3">III</option>
	        	<option value="4">IV</option>
	        	<option value="5">V</option>
	        	<option value="6">VI</option>
	        	<option value="7">VII</option>
	        	<option value="8">VIII</option>
	        </select>
	        <span class="input-group-addon">Type</span>
	        <select class="form-control" name="type">
	        	<option value="T">Theory</option>
	        	<option value="L">Lab</option>
	        </select>
	    </div><br/>
	    <div class="input-group">
	        <span class="input-group-addon">Elective or not?
	        <input class="form-control" type="checkbox" name="e" value="1"/></span>
	    </div><br/>
	    <input type="submit" name="add" value="Add" class="btn btn-primary pull-right">
	    </form>
    </div>
</div>
