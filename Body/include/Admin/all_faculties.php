<?php 
$sql="SELECT * FROM log_f WHERE br='$br' AND flag=1 ORDER BY fid";
$r=$db->query($sql);
if (isset($_POST['fid'])) {
	$__fid=$_POST['fid'];
	if($db->query("DELETE FROM `log_f` WHERE `log_f`.`fid`='$__fid'")){
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
			<tr><th>#fid</th><th>Name</th><th>Designation</th><th>Email</th></tr>
		</thead>
		<tbody>
		<form method="post">
			<?php while($fac=$r->fetch_array()){?>
			<tr>
				<th scope="row"><?php echo $fac['fid'];?></th>
				<input type="hidden" name="fid" value="<?php echo $fac['fid'];?>">
				<td><?php echo $fac['name'];?></td>
				<td><?php echo $fac['designation'];?></td>
				<td><?php echo $fac['email'];?></td>
				<td><button type='submit' class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
			<?php }?>
		</form>
		</tbody>
	</table>
</div>