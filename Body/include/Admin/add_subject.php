<?php
require CONTROLLERS.'functions/add_subject.php';
?>
<br/>
<div class="panel panel-info">
	<div class="panel-heading"><h2 class="panel-title">ADD SUBJECT</h2></div> 
	<div class="panel-body">
		<form method="post">
		<div class="input-group">
	        <span class="input-group-addon">Subject code</span>
	        <input class="form-control" required="required" type="text" name="code" placeholder="code">
	        <span class="input-group-addon">Subject name</span>
	        <input class="form-control" required="required" type="text" name="name" placeholder="Enter the full name of subject...">
        </div><br/>
        <div class="input-group">
	        <span class="input-group-addon">Sequence no. </span>
	        <select class="form-control" required="required" name="ref">
	        	<option>--Sr. no.--</option>
	        	<option value="1">1</option>
	        	<option value="2">2</option>
	        	<option value="3">3</option>
	        	<option value="4">4</option>
	        	<option value="5">5</option>
	        	<option value="6">6</option>
	        	<option value="7">7</option>
	        	<option value="8">8</option>
	        	<option value="9">9</option>
	        </select>
	        <span class="input-group-addon">Short Name</span>
	        <input class="form-control" required="required" type="text" name="sname" placeholder="Provide a short name for subject...">
        </div><br/>
		<div class="input-group">
	        <span class="input-group-addon">Branch</span>
	        <select class="form-control" name="branch">
	            <option <?= $br == '' ? ' selected="selected"' : '';?> value="">Select Branch</option>         
	            <option <?= $br == 'P' ? ' selected="selected"' : '';?> value="P">Physics Cycle</option>         
	            <option <?= $br == 'C' ? ' selected="selected"' : '';?> value="C">Chemistry Cycle</option>
	            <?php  for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
	            <option <?= $br == fetch_branches('code',$db,$i) ? ' selected="selected"' : '';?> value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
	            </option>
	             <?php } ?>   
          </select>
	        <span class="input-group-addon">Semester</span>
	        <select class="form-control" required="required" name="sem">
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
	        <select class="form-control" required="required" name="type">
	        	<option>--Theory or Lab--</option>
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
