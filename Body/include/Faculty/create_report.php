<?php if ($frm=='f') {
	require '../Controllers/functions/create_report.php';
} ?>
<br/>
<div class="panel panel-info">
	<div class="panel-heading"><h2 class="panel-title">CREATE REPORT</h2></div>	
	<div class="panel-body">
		<div class="alert alert-success" role="alert">
		  <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
			 Please choose the options carefully.
		</div>
		<form method="post" class="form-horizontal" role="form">
			<div class="input-group">
				<span class="input-group-addon">Choose Exam</span>
				<select name="" class="form-control" aria-describedby="basic-addon1">
					<option value="---">---</option>
					<option value="1">Internal 1</option>
					<option value="2">Internal 2</option>
					<option value="3">Internal 3</option>
					<option value="4">Preparatory</option>
				</select>
				<span class="input-group-addon">Branch</span>
				<select name="branch" id="branch" onChange="hideSec()" class="form-control" aria-describedby="basic-addon1">
					<option value="0">Select Branch</option>
					<option value="P">Basic science(Physics)</option>
					<option value="C">Basic science(Chemistry)</option>         
					<?php for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
					<option value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
					</option>
					<?php } ?>  
				</select>
				</div><br/>
				<div class="input-group">
				<span class="input-group-addon">Semester</span>
				<select  id="sem" onchange="hideSec()" class="form-control" aria-describedby="basic-addon1">
					<option value="---">---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				<span class="input-group-addon">Section</span>
				<select class="form-control" name="section" id="section">
	          		<option value="">Select</option>
				  	<option id="a" value="A">A</option>
				  	<option id="b" value="B">B</option>
			  		<option id="c" value="C">C</option>
				  	<option id="d" value="D">D</option>
			  		<option id="e" value="E">E</option>
				  	<option id="f" value="F">F</option>
		    	  	<option id="a2nd" value="A2">2nd shift A</option>
			  		<option id="b2nd" value="B2">2nd shift B</option>
				  	<option id="c2nd" value="C2">2nd shift C</option>
				  	<option id="a1" value="A">A1</option>
				  	<option id="a2" value="B">A2</option>
			  		<option id="a3" value="C">A3</option>
				  	<option id="a4" value="D">A4</option>
			  		<option id="a5" value="E">A5</option>
				  	<option id="a6" value="F">A6</option>
				 	<option id="b1" value="A">B1</option>
				  	<option id="b2" value="B">B2</option>
			  		<option id="b3" value="C">B3</option>
				  	<option id="b4" value="D">B4</option>
			  		<option id="b5" value="E">B5</option>
				  	<option id="b6" value="F">B6</option>
        		</select>
				</div><br/>
				<div class="input-group">
				<span class="input-group-addon">Subject</span>
				<select name="subjectcode" class="form-control" aria-describedby="basic-addon1">
					<?php echo my_subjects($db,$fid) ;?>
				</select>
				</div><br/>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</form>
</div>
</div>