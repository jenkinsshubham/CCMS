<div class="well col-xs-8 col-sm-8 col-md-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2">
        <?php
        	if($users->num_rows!=0)
         	while($user=$users->fetch_array()){
         		$u_id = ($t=='s') ? $user['usn'] : $user['fid'] ;
         		?>
        <div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
				<div class="navbar-right">
				<form method="post">
						<input type="hidden" name="un" value="<?php echo $user['username'] ;?>">
						<button name="btn" class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" value="a">
						<i class="glyphicon glyphicon-ok"></i>
						</button>
						<button name="btn" class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" value="x">
						<i class="glyphicon glyphicon-remove"></i>
					</button>
				</form>
				</div>
                <strong><?php echo $user['name'] ;?></strong><br>
                <span class="text-muted">&nbsp;&nbsp;&nbsp; <?php echo $u_id ;?></span>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 dropdown-user" data-for=".<?php echo $user['username'] ;?>">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos <?php echo $user['username'] ;?>">
            <div class="col-xs-12 col-sm-12 col-md-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $user['name'] ;?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-3">
                                <img class="img-circle"
                                	 src="<?php echo STYLERS.'images/avatars/user.png'?>"
                    				 style="width: 48px;height: 48px"
                                     alt="User Pic">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                <dl>
                                    <dt>Email:</dt>
                                    <dd><?php echo $user['email'] ;?></dd>
                                    <dt>Mobile</dt>
                                    <dd><?php echo $user['mob'] ;?></dd>
                                    <?php if($t=='s'){?>
                                    <dt>Semester:</dt>
                                    <dd><?php echo $user['sem'] ;?></dd>
                                    <dt>Section</dt>
                                    <dd><?php echo $user['sec'] ;?></dd>
                                    <dt>Father's Name</dt>
                                    <dd><?php echo $user['f_name'] ;?></dd>
                                    <dt>Address</dt>
                                    <dd><?php echo $user['address'] ;?></dd>
                                    <?php } else {?>
                                    <dt>Designation</dt>
                                    <dd><?php echo $user['designation'] ;?></dd>
                                    <?php } ?>

                                </dl>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $user['email'] ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><?php echo $user['mob'] ;?></td>
                                    </tr>
                                    <?php if($t=='s'){?>
                                    <tr>
                                        <td>Semester:</td>
                                        <td><?php echo $user['sem'] ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Section</td>
                                        <td><?php echo $user['sec'] ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td><?php echo $user['f_name'] ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><pre><?php echo $user['address'] ;?></pre></td>
                                    </tr>
                                    <tr>
                                    <?php } else {?>
                                        <td>Designation</td>
                                        <td><?php echo $user['designation'] ;?></td>
                                    </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="glyphicon glyphicon-remove"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

<?php }?>
 

        
        
 </div>

    <script type="text/javascript">
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>