<?php if(isset($_POST['submit'])) require CONTROLLERS.'functions/Admin/Settings.php';?>
<div id="s" class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Faculty Prefrences</div>
    <form method="post">

    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">
            Faculty Registration
            <div class="material-switch pull-right">
                <input id="facReg" <?php if($_facReg) echo "checked";?> name="facReg" value="1" type="checkbox"/>
                <label for="facReg" class="label-info"></label>
            </div>
        </li>
        <li class="list-group-item">
            Faculty can add Notice?
            <div class="material-switch pull-right">
                <input id="facNotice" name="facNotice" <?php if($_facNotice) echo "checked";?> value="1" type="checkbox"/>
                <label for="facNotice" class="label-warning"></label>
            </div>
        </li>
        <li class="list-group-item">
            Faculty can edit Profile?
            <div class="material-switch pull-right">
                <input id="facEditProfile" name="facEditProfile" <?php if($_facEditProfile) echo "checked";?> value="1" type="checkbox"/>
                <label for="facEditProfile" class="label-warning"></label>
            </div>
        </li><br/>
    <input type="hidden" name="_s_" value="fp">
    <div class="pull-right"><input class="btn btn-primary" type="submit" name="submit" value="Save"></div>
    </ul>
    </form>
</div>