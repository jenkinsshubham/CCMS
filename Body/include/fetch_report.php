<?php
// require CONTROLLERS.'functions/fetch_report.php';
?>



<br/>
<div class="panel panel-info">
<div class="panel-heading"><h2 class="panel-title"> REPORT BROWSER </h2></div> 
<div class="panel-body">
    <form role="form" method="post" action="<?php echo BASEPATH?>report">
        <div class="col-xs-12">
            <div class="col-md-12">
            	<div class="input-group">
            		<span class="input-group-addon">Exam</span>
	            	<select name='in' class="form-control">
	            		<option>--Choose Exam--</option>
	            		<option value="1">First Internal</option>
	            		<option value="2">Second Internal</option>
	            		<option value="3">Third Internal</option>
	            		<option value="4">Preparatory</option>
	            	</select>
            	</div><br/>
            	<div class="input-group">
	        		<span class="input-group-addon">Branch</span>
        			<select class="form-control" name="br">
                        <option value="">Select Branch</option>         
                        <option value="P">Physics Cycle</option>         
                        <option value="C">Chemistry Cycle</option>
                        <?php  for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
                            <option value="<?php echo fetch_branches('code',$db,$i)?>"> 
                            <?php echo fetch_branches('name',$db,$i)?>
                            </option>
                        <?php } ?>   
                    </select>
                   </div><br/>
                   <div class="input-group">
            		<span class="input-group-addon">Semester</span>
	            	<select class="form-control" name="sem">
                        <option value="">--Sem--</option>         
                        <option value="1">I</option>         
                        <option value="2">II</option>
                        <option value="3">III</option>         
                        <option value="4">IV</option>         
                        <option value="5">V</option>         
                        <option value="6">VI</option>         
                        <option value="7">VII</option>         
                        <option value="8">VIII</option> 
                    </select>
            		<span class="input-group-addon">Section</span>
	            	<select name='sec' class="form-control">
		                <option id="A" value="A">A</option>
		                <option id="B" value="B">B</option>
		                <option id="c" value="C">C</option>
		                <option id="d" value="D">D</option>
		                <option id="e" value="E">E</option>
		                <option id="f" value="F">F</option>
		                <option id="A2nd" value="A2">2nd shift A</option>
		                <option id="b2nd" value="B2">2nd shift B</option>
		                <option id="c2nd" value="C2">2nd shift C</option>
		                <option id="A1" value="A1">A1</option>
		                <option id="A2" value="A2">A2</option>
		                <option id="A3" value="A3">A3</option>
		                <option id="A4" value="A4">A4</option>
		                <option id="A5" value="A5">A5</option>
		                <option id="A6" value="A6">A6</option>
		                <option id="B1" value="B1">B1</option>
		                <option id="B2" value="B2">B2</option>
		                <option id="B3" value="B2">B3</option>
		                <option id="B4" value="B5">B4</option>
		                <option id="B5" value="B5">B5</option>
		                <option id="B6" value="B6">B6</option>
	            	</select>
            	</div>
            	<br/>
                <button class="btn btn-primary btn-lg pull-right" type="submit" name="submit" >GO</button>
            </div>
        </div>
    </form>
</div>
</div>