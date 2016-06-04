<div class='panel panel-info' style='margin:12px'>
  <div class='panel-heading'> <h3 class='panel-title'>My Account</h3> </div>
  <div class='panel-body' style='padding:12px;'>
    <ul class='nav navbar-nav'>
      <li>
        <a href='<?php echo BASEPATH ?>page/profile'>
          <span class='glyphicon glyphicon-user' aria-hidden='true'></span> My Profile</a>
      </li>
      <?php if($_facNotice){?>
      <li>
        <a href='<?php echo BASEPATH ?>page/writeNotice'>
          <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Add notice</a>
      </li>
      <?php }?>
      <li>
        <a href="#">
        <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Add Assignments</a>
      </li>
      <li>
        <a href="<?php echo BASEPATH ?>page/mySubjects">
          <span class='glyphicon glyphicon-book' aria-hidden='true'></span> My Subjects</a>
      </li>
      <li>
        <a href='<?php echo BASEPATH ?>page/createReport'>
          <span class='glyphicon glyphicon-copy' aria-hidden='true'></span> Create Report</a>
      </li>
      <li>
        <a href='logout'>
          <span class='glyphicon glyphicon-share' aria-hidden='true'></span> Logout</span></a>
      </li>
    </ul>
</div>
</div>