
<br/>
<p style="float:right;"><a href='?profile_edit'><span style="background-color:#901;color:#000;padding:15px;border-radius:10px">Edit Profile</span></a></p>
<div class="panel panel-info" style='margin:12px'>
 <div class='panel-body' style='padding:12px;'>
 
  <?php echo $img;?><hr/>
  <label>Name: </label> <?php echo $name;?><hr/>
  <label>Userame: </label> <?php echo $username;?><hr/>
 <?php if ($frm=='s') { ?>
  <label>USN: </label> <?php echo $usn;?><hr/>
  <label>Semester: </label> <?php echo $sem;?><hr/>
  <label>Branch: </label> <?php echo $br;?><hr/>
  <label>Section: </label> <?php echo $sec;?><hr/>
  <label>Address: </label> <?php echo $address; ?><hr/>
  
 <?php ;} else { ?>
  <label>Faculty ID: </label> <?php echo $fid; ?><hr/>
  <label>Department: </label> <?php echo $department; ?><hr/>
  <label>Designation: </label> <?php echo $designation; ?><hr/>
<?php } ?>
  <label>Email: </label> <?php echo $email;?><hr/>
  <label>Mobile no. : </label> <?php echo $mob;?><hr/>
  
 </div>
</div>