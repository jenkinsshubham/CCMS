<?php require CONTROLLERS.'functions/Admin/subject_control.php';?>
<style type="text/css">
	table{
		max-width: 1100px;
	}
	tbody {
	    display:block;
	    max-height:1060px;
	    overflow-y:scroll;
	}
	thead, tbody tr {
	    display:table;
	    width:100%;
	    table-layout:fixed;
	}
	thead {
	    width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
	}
</style>
<div class="table-responsive">
	<h3 class="heading">Subjects</h3><hr>
	<form method="post">
		<button class="btn btn-default" name="edit" type="submit">Edit</button>
		<button class="btn btn-danger" name="delete" type="submit">Delete</button>
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th>#Sem</th>
					<th>Code</th>
					<th>SN.</th>
					<th>Name</th>
					<th>Short-name</th>
					<th>Type</th>
					<th>Elective</th>
				</tr>
			</thead>
			<tbody style="height:200px;overflow-y:auto;">
				<?php while($sub=$_sub->fetch_array()){
					$_ele=($sub['elective'])?'ok':'remove';
					?>
				<tr>
					<td><input class="form-control" type="checkbox" name='id[]' value="<?php echo $sub['id'];?>"></td>
					<th scope="row"><?php echo $sub['sem'];?></th>
					<td><?php echo $sub['code'];?></td>
					<td><?php echo $sub['ref'];?></td>
					<td><?php echo $sub['name'];?></td>
					<td><?php echo $sub['sname'];?></td>
					<td><?php echo $sub['type'];?></td>
					<td><span class="glyphicon glyphicon-<?php echo $_ele;?>"></span></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		</form>
</div>