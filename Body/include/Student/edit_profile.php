<?php
session_start();
require_once 'include/dbconnect.php';

if(isset($_POST['btn-submit']))
{
$usn = mysql_real_escape_string($_POST['usn']);
$name = mysql_real_escape_string($_POST['name']);
$sem = mysql_real_escape_string($_POST['sem']);
$branch = mysql_real_escape_string($_POST['branch']);
$section = mysql_real_escape_string($_POST['section']);
$dob = mysql_real_escape_string($_POST['dob']);
$pic = mysql_real_escape_string($_POST['pic']);
$address = mysql_real_escape_string($_POST['address']);

// FOR REGISTERING USERS
if(isset($_GET['register']))	
{
$new = "INSERT INTO usn_info(usn,name,section,branch,dob,pic,address,sem) 
            VALUES('$usn','$name','$section','$branch','$dob','$pic','$address','$sem')";
	if(mysql_query($new)) {
	 echo "<script>alert('Successfully Registered')</script>";
    header("Location: index.php");
	 }
 }

// FOR LOGGED USER 
if(isset($_GET['profile_edit']))
{
 if(isset($_SESSION['user']))	
{
$update = "UPDATE sit_db.usn_info 
	        SET name = '$name', dob = '$dob', address = '$address', section = '$section', img = '$img' , sem='$sem' 
	        WHERE usn_info.usn = '$usn'";
	if(mysql_query($update)) {?>
		<script>alert("Profile Updated sucessfully") </script><?php ;
   header("Location: ?profile");}
	 
 }

}
}


?>
<?php if(!isset($_GET['profile_edit']))
{
	?>
<form class='form-signin' method='post'>
        <h2 class='form-signin-heading' id="details">Details</h2><hr/>
        <label>Picture: <input type='file' name='pic'  class='form-control'></label>
        <input type='hidden' name='usn'  class='form-control' value="<?php if(isset($_GET['register'])){echo $_COOKIE['usn'];};  ?>" placeholder='USN' required autofocus>
        <input type='text' name='name'  class='form-control' placeholder='Full Name' required autofocus>
           <div class='checkbox'>      
        <input type='text' name='section'  class='form-control' placeholder='Current Section'>
         <select name="sem">
      		<option>Sem</option>         
      		<option>I</option>         
      		<option>II</option>         
      		<option>III</option>         
      		<option>IV</option>         
      		<option>V</option>         
      		<option>VI</option>         
      		<option>VII</option>         
      		<option>VIII</option>         
         </select>
         &nbsp;
         <select name="branch">
      		<option>Select Branch</option>         
      		<option>CS</option>         
      		<option>MR</option>         
      		<option>AE</option>         
      		<option>ME</option>         
      		<option>NA</option>         
      		<option>EC</option>         
      		<option>EE</option>         
         </select>
          </div>
        <input type='date' name='dob'  class='form-control' placeholder='Date of Birth'>
        <textarea name='address' class='form-control' placeholder='Address'></textarea>
        
        
         
        
        <button class='btn btn-lg btn-primary btn-block' type='submit' name='btn-submit'>Submit</button>
</form>
<hr/>
<?php } ;
if(isset($_SESSION['user']))
{
	if(isset($_GET['profile_edit']))
{
	?>


<form class='form-signin' method='post'>
        <h2 class='form-signin-heading' id="details">Edit Profile</h2><hr/>
        <label>Picture: <input type='file' name='pic'  class='form-control'></label>
        <input type='hidden' name='usn'  class='form-control' value="<?php echo "{$_SESSION['user']}";  ?>"required>
        <input type='text' name='name'  class='form-control' value="<?php echo $row['name'];?>" placeholder='Full Name' required autofocus>
        <input type='text' name='section'  class='form-control' value="<?php echo $row['section'];?>" placeholder='Current Section'>
        <select name="sem">
      		<option>Sem</option>         
      		<option>I</option>         
      		<option>II</option>         
      		<option>III</option>         
      		<option>IV</option>         
      		<option>V</option>         
      		<option>VI</option>         
      		<option>VII</option>         
      		<option>VIII</option>         
         </select>
         &nbsp;
         <select name="branch">
      		<option>Select Branch</option>         
      		<option>CS</option>         
      		<option>MR</option>         
      		<option>AE</option>         
      		<option>ME</option>         
      		<option>NA</option>         
      		<option>EC</option>         
      		<option>EE</option>         
         </select>
        
        <input type='date' name='dob'  class='form-control' value="<?php echo $row['dob'];?>" placeholder='Date of Birth'>
        <textarea name='address' class='form-control' placeholder='Address'><?php echo $row['address'];?></textarea>
        
        
         
        
        <button class='btn btn-lg btn-primary btn-block' type='submit' name='btn-submit'>Update</button>
</form>
<hr/>

<?php } } ?>	



