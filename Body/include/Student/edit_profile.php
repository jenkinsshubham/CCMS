<?php

if (isset($_POST['go'])) {
 
$usn = $db->real_escape_string($_POST['usn']);
$name = $db->real_escape_string($_POST['name']);
$sem = $db->real_escape_string($_POST['sem']);
$br = $db->real_escape_string($_POST['br']);
$sec = $db->real_escape_string($_POST['sec']);
$email = $db->real_escape_string($_POST['email']);
$pic = $db->real_escape_string($_POST['pic']);
$address = $db->real_escape_string($_POST['address']);


$update = "UPDATE `log_s` 
	        SET name = '$name', email = '$email', address = '$address', sec = '$sec', img = '$img' , sem='$sem' 
	        WHERE username = '$username'";
	if($db->query($update)) {?>
		<script>alert("Profile Updated sucessfully") </script><?php
   header("Location: /");}
	 
 }


?>
<form class='form-signin' method='post'>
        <h2 class='form-signin-heading' id="details">Details</h2><hr/>
        <label>Picture: <input type='file' name='pic'  class='form-control'></label>
        <input type='<?php if($sem>1) echo "hidden"; else echo "text";?>' name='usn'  class='form-control' placeholder='USN' value="<?php if($sem>1) echo $usn ?>">
        <input type='text' name='name' value="<?php echo $name ?>" class='form-control' placeholder='Full Name' required autofocus>
           <div class='checkbox'>      
        <input type='text' name='sec' value="<?php echo $sec ?> " class='form-control' placeholder='Current Section'>
         <select name="sem">
      		<option value="">Sem</option>         
      		<option value="1">I</option>         
      		<option value="2">II</option>         
      		<option value="3">III</option>         
      		<option value="4">IV</option>         
      		<option value="5">V</option>         
      		<option value="6">VI</option>         
      		<option value="7">VII</option>         
      		<option value="8">VIII</option>         
         </select>
         &nbsp;
         <select name="br">
      		<option value="">Select Branch</option>         
      		<option value="">CS</option>         
      		<option value="">MR</option>         
      		<option value="">AE</option>         
      		<option value="">ME</option>         
      		<option value="">NA</option>         
      		<option value="">EC</option>         
      		<option value="">EE</option>         
         </select>
          </div>
        <input type='email' name='email'  class='form-control' value="<?php echo $email ?>" placeholder='Email'>
        <textarea name='address' class='form-control' placeholder='Address'><?php echo $address ?></textarea>
        
        <button class='btn btn-lg btn-primary btn-block' type='submit' name='go'>Submit</button>
</form>
<hr/>