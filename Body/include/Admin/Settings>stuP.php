<?php if(isset($_POST['submit'])) require CONTROLLERS.'functions/Admin/Settings.php';?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Faculty Prefrences</div>
    <form method="post">

    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">
            Student Registration
            <div class="material-switch pull-right">
                <input id="stuReg" <?php if($_stuReg) echo "checked";?> name="stuReg" value="1" type="checkbox"/>
                <label for="stuReg" class="label-info"></label>
            </div>
        </li>
        <li class="list-group-item">
        	Student can edit Profile?
        <div class="material-switch pull-right">
            <input id="stuEditProfile" name="stuEditProfile" <?php if($_stuEditProfile) echo "checked";?> value="1" type="checkbox"/>
            <label for="stuEditProfile" class="label-warning"></label>
        </div>
        </li><br/>
        <input type="hidden" name="_s_" value="sp">
        <div class="pull-right"><input class="btn btn-primary" type="submit" name="submit" value="Save"></div>
    </ul>
    </form>
</div>