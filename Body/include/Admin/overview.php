<?php
	require CONTROLLERS.'functions/Admin/overview.php';
?>
	<h1>Hello, <?php echo strtok($name,' ');?>.</h1><br/>
	<blockquote>
	<?php if($level=='admin'){?>
		<hr/>
			<h4><b><u>Here are some details about this site</u></b></h4><br/>
			<footer><b>Principal:&emsp;&emsp;</b><cite title="<?php echo $_princi;?>"><?php echo $_princi;?></cite></footer>
			<br/>
			<footer>
				<b>Faculty registration:&emsp;&emsp;</b><cite title="<?php echo $_fr;?>"><?php echo $_fr;?></cite>
			</footer>
			<footer>
				<b>Faculty </b><cite title="can<?php echo $_fn;?>"><em>can<?php echo $_fn;?></em></cite> publish Notice.
			</footer>
			<footer>
				<b>Faculty </b><cite title="can<?php echo $_fe;?>"><em>can<?php echo $_fe;?></em></cite> edit profile.
			</footer>
			<footer>
				<b>Student registration:&emsp;&emsp;</b><cite title="<?php echo $_sr;?>"><?php echo $_sr;?></cite>
			</footer>
			<footer>
				<b>Student </b><cite title="can<?php echo $_se;?>"><em>can<?php echo $_se;?></em></cite> edit profile.
			</footer>
			<br/>
			<footer>
				<b>No. of HODs:&emsp;&emsp;</b><cite title="<?php echo $hodCount;?>"><?php echo $hodCount;?></cite>
			</footer>


	<?php }
	elseif ($level=='hod') {?>
			<h4><b><u>Here are some details about <?php echo $br;?> department</u></b></h4><br/>
			<footer>
				<b>Registered faculties:&emsp;&emsp;</b><cite title="<?php echo $facCount;?>"><?php echo $facCount;?></cite>
			</footer>
			<footer>
				<b>Registered students:&emsp;&emsp;</b><cite title="<?php echo $stuCount;?>"><?php echo $stuCount;?></cite>
			</footer>
			<footer>
				<b>No. of subjects:&emsp;&emsp;</b><cite title="<?php echo $subCount;?>"><?php echo $subCount;?></cite>
			</footer>
		
	<?php }
	?>
	</blockquote>