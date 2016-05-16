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
   header("Location: ".BASEPATH);}
	 
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
      		<option <?= $sem == '' ? ' selected="selected"' : '';?> value="">Sem</option>         
      		<option <?= $sem == '1' ? ' selected="selected"' : '';?> value="1">I</option>         
      		<option <?= $sem == '2' ? ' selected="selected"' : '';?> value="2">II</option>         
      		<option <?= $sem == '3' ? ' selected="selected"' : '';?> value="3">III</option>         
      		<option <?= $sem == '4' ? ' selected="selected"' : '';?> value="4">IV</option>         
      		<option <?= $sem == '5' ? ' selected="selected"' : '';?> value="5">V</option>         
      		<option <?= $sem == '6' ? ' selected="selected"' : '';?> value="6">VI</option>         
      		<option <?= $sem == '7' ? ' selected="selected"' : '';?> value="7">VII</option>         
      		<option <?= $sem == '8' ? ' selected="selected"' : '';?> value="8">VIII</option>         
         </select>
         &nbsp;
         <select name="br">
      		<option <?= $br == '' ? ' selected="selected"' : '';?> value="">Select Branch</option>         
      		 <?php for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
            <option <?= $br == fetch_branches('code',$db,$i) ? ' selected="selected"' : '';?> value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
            </option>
           <?php } ?>   
         </select>
          </div>
        <input type='email' name='email'  class='form-control' value="<?php echo $email ?>" placeholder='Email'>
        <textarea name='address' class='form-control' placeholder='Address'><?php echo $address ?></textarea>
        
        <button class='btn btn-lg btn-primary btn-block' type='submit' name='go'>Submit</button>
</form>
<hr/>