<?php
if(isset($_GET['search'])){
  include CONTROLLERS.'functions/searched_profile.php';
  ?>
<br/>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_name;?>
              <?php if($_frm=='f'){ ?>
              <span class="pull-right">(<?php echo $_designation;?>)</span><?php }?>
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $_avatar;?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><?php echo $_a = ($_frm=='s') ? "USN" : "Faculty ID" ;?></td>
                        <td><?php echo $_id;?></td>
                      </tr>
                      <tr>
                        <td><?php echo $_a = ($_frm=='s') ? "Branch" : "Department" ;?></td>
                        <td><?php echo $_br;?></td>
                      </tr>
                      <?php if($_frm=='s'){ ?>
                      <tr>
                        <td>Semester</td>
                        <td>
                          <?php echo $_sem;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Section</td>
                        <td><?php echo $_sec;?></td>
                      </tr>
                      <?php }?>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $_sex;?></td>
                      </tr>
                      <?php if($_frm=='s'){ ?>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $_dob;?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $_address;?></td>
                      </tr>
                      <?php ; } ?>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $_email;?>"><?php echo $_email;?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php echo $_mob; if($_frm=='s'){ ?> (User)<br><br><?php echo $_f_mob." (Guardian)";}?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                      <a href="mailto:<?php echo $_email;?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                  </div>
            
          </div>
        </div>
      </div>
    </div>
<?php }
else{?>
<br/>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $name;?>
              <?php if($frm=='f'){ ?>
              <span class="pull-right">(<?php echo $designation;?>)</span><?php }?>
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $avatar;?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                <a href="<?php echo BASEPATH ;?>page/uploadPic">
                  <button class="btn-sm btn-default pull-right btn">change pic</button>
                </a>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><?php echo $a = ($frm=='s') ? "USN" : "Faculty ID" ;?></td>
                        <td><?php echo $id;?></td>
                      </tr>
                      <tr>
                        <td><?php echo $a = ($frm=='s') ? "Branch" : "Department" ;?></td>
                        <td><?php echo $br;?></td>
                      </tr>
                      <?php if($frm=='s'){ ?>
                      <tr>
                        <td>Semester</td>
                        <td>
                          <?php echo $sem;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Section</td>
                        <td><?php echo $sec;?></td>
                      </tr>
                      <?php }?>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $sex;?></td>
                      </tr>
                      <?php if($frm=='s'){ ?>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $dob;?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $address;?></td>
                      </tr>
                      <?php ; } ?>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php echo $mob; if($frm=='s'){ ?> (User)<br><br><?php echo $f_mob." (Guardian)";}?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="mailto:<?php echo $email;?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <?php  
                        if(($frm=='f'&&$_facEditProfile)||($frm=='s'&&$_stuEditProfile)){?>
                        <span class="pull-right">
                            <a href="<?php echo BASEPATH?>page/editProfile" data-original-title="Edit profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <!-- <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                        </span>
                        <?php }?>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
<?php }?>