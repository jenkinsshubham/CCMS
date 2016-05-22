<?php
  require CONTROLLERS.'functions/edit_profile.php';
?>

<br/>
<form class='form-signin' method='post'>
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><input class="form-control" name="name" type="text" value="<?php echo $name;?>"></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $avatar;?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><?php echo $a = ($frm=='s') ? "USN" : "Faculty ID" ;?></td>
                        <td><?php echo $id;?></td>
                      </tr>
                      <tr>
                        <td><?php echo $a = ($frm=='s') ? "Branch" : "Department" ;?></td>
                        <td>
                          <select class="form-control" name="br">
                            <option <?= $br == '' ? ' selected="selected"' : '';?> value="">Select Branch</option>         
                            <?php if($frm!='f'&&$sem<3){?>
                            <option <?= $br == 'P' ? ' selected="selected"' : '';?> value="P">Physics Cycle</option>         
                            <option <?= $br == 'C' ? ' selected="selected"' : '';?> value="C">Chemistry Cycle</option>
                            <?php } else { for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
                            <option <?= $br == fetch_branches('code',$db,$i) ? ' selected="selected"' : '';?> value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
                            </option>
                             <?php }} ?>   
                          </select>
                        </td>
                      </tr>
                      <?php if($frm=='s'){ ?>
                      <tr>
                        <td>Semester</td>
                        <td>
                          <select class="form-control" name="sem">
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
                        </td>
                      </tr>
                      <tr>
                        <td>Section</td>
                        <td><input name="sec" class="form-control" type="text" value="<?php echo $sec;?>"></td>
                      </tr>
                      <?php }?>
                      <tr>
                        <td>Gender</td>
                        <td>
                          <select class="form-control" name="sex">
                            <option <?= $_sex == 'M' ? ' selected="selected"' : '';?> value="M">Male</option>         
                            <option <?= $_sex == 'F' ? ' selected="selected"' : '';?> value="F">Female</option>
                          </select>
                        </td>
                      </tr>
                      <?php if($frm=='s'){ ?>
                      <tr>
                        <td>Date of Birth</td>
                        <td><input name="dob" class="form-control" type="text" value="<?php echo $dob;?>"></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><textarea name='address' class='form-control'><?php echo $address ?></textarea></td>
                      </tr>
                      <?php ; } ?>
                      <tr>
                        <td>Email</td>
                        <td><input name="email" class="form-control" type="text" value="<?php echo $email;?>"></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><input name="mob" class="form-control" type="text" value="<?php echo $mob?>"><?php if($frm=='s'){ echo "(User)<br><br><input name='f_mob' class=\"form-control\" type=\"text\" value=\"$f_mob\"> (Guardian)";}?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <button class='btn btn-lg btn-primary btn-block' type='submit' name='go'>SAVE</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>