<div class='panel panel-info' style='margin:12px'>
  <div class='panel-heading'> <h3 class='panel-title'>My Account</h3> </div>
  <div class='panel-body' style='padding:12px;'>
    <ul class='nav navbar-nav'>
      <li>
        <a href='<?php echo BASEPATH ?>page/profile'>
          <span class='glyphicon glyphicon-user' aria-hidden='true'></span>My Profile</a>
      </li>
      <li><a href='#'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Messages</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span> Settings
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="<?php echo BASEPATH ?>page/editProfile">edit profile</a></li>
          <li><a href="<?php echo BASEPATH ?>page/changePassword">change password</a></li>
        </ul>
      </li>
      <li><a href='logout'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Logout</span></a></li>
      </ul>
  </div>
</div>
