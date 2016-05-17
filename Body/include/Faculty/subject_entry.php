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
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<span class="input-group-addon">No. of Lab subjects</span>
				<select name="nooflabs" class="form-control" aria-describedby="basic-addon1">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<br/>




<?php
		
	$count=1;	
	while($count<=3){
	?>
<div class="input-group">
	<span class="input-group-addon">Theory <?php echo $count;?> </span>
      <span class="style3">
	 <?php 
		echo "<select class='form-control' name='subject".$count."' id='subject".$count."'>";
		echo "<option value=''>SELECT</option>";
		if($department == 'BA')
		{
			echo '<optgroup label="'.GetBranch($db,$department).'">';
			$qr = "SELECT * FROM subjects WHERE branch = 'BA' and type='T'";
			$qry1 = $db->query($qr);
			while($arr = $qry1->fetch_assoc()){
				echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
			}
			echo '</optgroup>';
		}
	
		if($department == 'ME' || $department == 'AU' || $department == 'MR' || $department == 'AE')
		{
			$str = array('ME'=>'BE', 'AU'=>'BE', 'MR'=>'BE', 'AE'=>'BE', 'LDE'=>'MTECH', 'MTP'=>'MTECH', 'MAR'=>'MTECH', 'LVS'=>'MTECH');
			echo subjectListForSelection($db,$str);
		}
		else if($department == 'EC' || $department == 'EE')
		{
			$str = array('EC'=>'BE', 'EE'=>'BE', 'LDE'=>'MTECH', 'MTP'=>'MTECH', 'MAR'=>'MTECH', 'LVS'=>'MTECH');
			echo subjectListForSelection($db,$str);
		}
		else if($department == 'CS' || $department == 'IS')
		{
			$str = array('CS'=>'BE', 'MCA'=>'MCA', 'IS'=>'BE', 'SCS'=>'MTECH', 'SCN'=>'MTECH', 'LDE'=>'MTECH', 'MTP'=>'MTECH', 'MAR'=>'MTECH', 'LVS'=>'MTECH');
			echo subjectListForSelection($db,$str);
		}
		else if($department == 'NT')
		{
			echo '<optgroup label="'.GetBranch($db,$department).'">';
				$qr = "SELECT * FROM subjects WHERE branch='NT' and type='T'";
				$qry1 = $db->query($qr);
				
				while($arr = $qry1->fetch_assoc())
				{
					echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
				}	
			echo '</optgroup>';		
		}
		else
		{
			if($department == 'MBA'){
				echo '<optgroup label="'.GetBranch($db,$department).'">';
				$qr = "SELECT * FROM subjects WHERE type='T' and branch='MBA'";
				$qry1 = $db->query($qr)or die($db->error());
				while($arr = $qry1->fetch_assoc()){
					echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
				}
				echo '</optgroup>';	
			}
			else if($department == 'MCA'){
				echo '<optgroup label="'.GetBranch($db,$department).'">';
				$qr = "SELECT * FROM subjects WHERE type='T' and branch='MCA'";
				$qry1 = $db->query($qr);
				while($arr = $qry1->fetch_assoc()){
					echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
				}
				echo '</optgroup>';	
			}
			else  if(($department == 'C')||($department == 'MATH')){
				echo firstYearProgramPC($db);
				
				$qr = "SELECT * FROM subjects WHERE type='T' and branch='MBA' and sem=1";
				$qry1 = $db->query($qr);
				while($arr = $qry1->fetch_assoc()){
					echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
				}
				echo "<option value='13MCA12'>(13MCA12)Discrete Mathematical Structure</option>";
				echo "<option value='10MAT31'>(10MAT31)Engineering Mathamatics - III</option>";	
				echo "<option value='10CS34'>(10CS34)Discrete Mathematical Structures</option>";
				echo "<option value='10MAT41'>(10MAT41)Engineering Mathamatics - IV</option>";
				echo "<option value='10CS42'>(10CS42)Graph Theory and Combinatorics</option>";
 				echo "<option value='10 AE 661'>(10 AE 661)Numerical Methods</option>";
			}	
			else  if(($department == 'P')||($department == 'MATH'))
			{
				echo firstYearProgramPC($db);
				echo "<option value='13MCA12'>(13MCA12)Discrete Mathematical Structure</option>";
				echo "<option value='10MAT31'>(10MAT31)Engineering Mathamatics - III</option>";	
				echo "<option value='10CS34'>(10CS34)Discrete Mathematical Structures</option>";
				echo "<option value='10MAT41'>(10MAT41)Engineering Mathamatics - IV</option>";
				echo "<option value='10CS42'>(10CS42)Graph Theory and Combinatorics</option>";
				echo "<option value='10 AE 661'>(10 AE 661)Numerical Methods</option>";
			}
	 	}	 
		echo "</select></div>";
	?>

   </span>
     <?php
		$count++;
	}
	?>


			<br/>
			<div class="input-group">
				<span class="input-group-addon">Lab 1</span>
				      <?php 
		echo "<select class='form-control' name='lab1' id='lab1'>";
		echo "<option value=''>SELECT</option>";
		
		if($br == 'BA')
		{
				$qr = "SELECT * FROM subjects WHERE branch = 'BA' and type='L'";
							$qry1 = $db->query($qr);
				
							while($arr = $qry1->fetch_assoc())
							{
								echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
							}
		}
		
		if($br == 'EC' || $br == 'EE')
		{
			$qr = "SELECT * FROM subjects WHERE (branch='EE' OR branch='EC') and type='L'";
			$qry1 = $db->query($qr);

		 	while($arr = $qry1->fetch_assoc())
		 	{
		 		echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
		 	}
		  	
			$qr = "SELECT * FROM 1yr_subjects WHERE type='L'";
		 	$qry1 = $db->query($qr)or die($db->error());
			
		 	while($arr = $qry1->fetch_assoc())
		 	{
		 		echo "<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
		 	}
		}
		else if($br == 'ME' || $br == 'AU' || $br == 'AE' || $br == 'MR')
		{
			$qr = "SELECT * FROM subjects WHERE type='L' and ( branch='ME' OR branch = 'AU' OR branch = 'MR' OR branch = 'AE')";
		    $qry1 = $db->query($qr);

		 	while($arr = $qry1->fetch_assoc())
		 	{
		 		echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
		 	}
			
		  	$qr = "SELECT * FROM 1yr_subjects WHERE type='L'";
		 	$qry1 = $db->query($qr)or die($db->error());
		 	
			while($arr = $qry1->fetch_assoc())
		 	{
		 		echo "<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
		 	}
		}
		else if($br == 'CS' || $br == 'IS')
		{
		    $qr = "SELECT * FROM subjects WHERE (branch='CS' OR branch='MCA' OR branch='IS') and type='L'";
			$qry1 = $db->query($qr);
				
			while($arr = $qry1->fetch_assoc())
			{
				echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
			}
			
			$qr = "SELECT * FROM 1yr_subjects WHERE type='L'";
			$qry1 = $db->query($qr)or die($db->error());
			
			while($arr = $qry1->fetch_assoc())
			{
				echo "<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
			}
		}
		else if($br == 'NT')
		{
				$qr = "SELECT * FROM subjects WHERE branch='NT' and type='L'";
							 $qry1 = $db->query($qr);
				
							 while($arr = $qry1->fetch_assoc())
							 {
								echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
							 }
							
		}
		else
		{
			   if($br == 'MCA')
			   {
				 $qr = "SELECT * FROM subjects WHERE type='L' and branch='MCA'";
				 $qry1 = $db->query($qr);
				 while($arr = $qry1->fetch_assoc())
				 {
					echo "<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
				 }
			   }
			  else  if(($br == 'C')||($br == 'MATH'))
			  {
				 $qr = "SELECT * FROM 1yr_subjects WHERE type='L' and cycle='C'";
				 $qry1 = $db->query($qr);
				 while($arr = $qry1->fetch_assoc())
				 {
					echo "<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
				 }
			  }
			   else  if(($br == 'P')||($br == 'MATH'))
			  {
				 
				 $qr = "SELECT * FROM 1yr_subjects WHERE type='L' and cycle='P'";
				 $qry1 = $db->query($qr);
				 while($arr = $qry1->fetch_assoc())
				 {
					echo "<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
				 }
			  }
	  }
		echo "</select>";
	?>
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