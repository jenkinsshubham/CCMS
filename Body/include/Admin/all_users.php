<?php 
$t_=($selected=='allFaculties')?'f':'s';
$order=($selected=='allFaculties')?'fid':'usn';
$_2c=($selected=='allFaculties')?'Designation':'Semester';
$_2d=($selected=='allFaculties')?'designation':'sem';
$target='log_'.$t_;
$sql="SELECT * FROM $target WHERE br='$br' AND flag=1 ORDER BY $order";
$r=$db->query($sql);
if (isset($_POST['fid'])) {
	$__fid=$_POST['fid'];
	if($db->query("DELETE FROM $target WHERE username='$__fid'")){
		$_SESSION['_m']="Faculty with fid <kbd>$__fid</kbd> removed successfully.";
		$_SESSION['_t']='s';
		echo "<script>window.location.assign(window.location.href);</script>";
	}
}
?>
<div class="table-responsive">
	<h3 class="heading">Faculties</h3><hr>
	<table class="table table-hover">
		<thead>
			<tr><th>#<?php echo $order ;?></th><th>Name</th><th><?php echo $_2c ;?></th><th>Email</th></tr>
		</thead>
		<tbody>
		<form method="post">
			<?php while($fac=$r->fetch_array()){?>
			<tr>
				<th scope="row"><?php echo $fac[$order];?></th>
				<input type="hidden" name="fid" value="<?php echo $fac['username'];?>">
				<td><?php echo $fac['name'];?></td>
				<td><?php echo $fac[$_2d];?></td>
				<td><?php echo $fac['email'];?></td>
				<td><button type='submit' class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
			<?php }?>
		</form>
		</tbody>
	</table>
</div>