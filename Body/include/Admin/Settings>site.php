<?php if(isset($_POST['submit'])) require CONTROLLERS.'functions/Admin/Settings.php';?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div id="s" class="panel-heading">Site Settings</div>
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
        </li><br/>
        <input type="hidden" name="_s_" value="ss">
        <div class="pull-right"><input class="btn btn-primary" type="submit" name="submit" value="Save"></div>
    </ul>
    </form>
</div>