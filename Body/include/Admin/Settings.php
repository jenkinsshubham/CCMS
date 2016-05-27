<?php if(isset($_POST['submit'])) require CONTROLLERS.'functions/Admin/Settings.php';?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Site Settings</div>
    <form method="post">

    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">
            Site Name
            <div class="pull-right">
                <input type="text" name="sfn" class="form-control" value="<?php echo SITENAME ?>" />
            </div>
        </li>
        <li class="list-group-item">
            Short Name
            <div class="pull-right">
                <input type="text" name="ssn" class="form-control" value="<?php echo SHORTNAME ?>" />
            </div>
        </li>
        <li class="list-group-item">
            Tagline
            <div class="pull-right">
                <input type="text" name="tl" class="form-control" value="<?php echo TAGLINE ?>" />
            </div>
        </li>
        <li class="list-group-item">
            Email
            <div class="pull-right">
                <input type="text" name="em" class="form-control" value="<?php echo EMAIL ?>" />
            </div>
        </li>
        <li class="list-group-item">
            Basepath
            <div class="pull-right">
                <input type="text" name="bp" class="form-control" value="<?php echo BASEPATH ?>" />
            </div>
        </li>
        <li class="list-group-item"><b> Faculty Preferences</b></li>
            <ul class="list-group">
            <li class="list-group-item">
                Faculty Registration
                <div class="material-switch pull-right">
                    <input id="facReg" checked name="facReg" type="checkbox"/>
                    <label for="facReg" class="label-info"></label>
                </div>
            </li>
            <li class="list-group-item">
                Faculty can add Notice?
                <div class="material-switch pull-right">
                    <input id="facNotice" name="facNotice" checked type="checkbox"/>
                    <label for="facNotice" class="label-warning"></label>
                </div>
            </li>
            </ul>
        <li class="list-group-item"><b> Student Preferences</b></li>
            <ul class="list-group">
                <li class="list-group-item">
                    Student Registration
                    <div class="material-switch pull-right">
                        <input id="StuReg" checked name="StuReg" type="checkbox"/>
                        <label for="StuReg" class="label-info"></label>
                    </div>
                </li>
                <li class="list-group-item">
                Student can edit Profile?
                <div class="material-switch pull-right">
                    <input id="StuEditProfile" name="StuEditProfile" checked type="checkbox"/>
                    <label for="StuEditProfile" class="label-warning"></label>
                </div>
                </li>
            </ul>
        <br/>
        <div class="pull-right"><input class="btn btn-primary" type="submit" name="submit" value="Save"></div>
    </ul>
    </form>
</div>            