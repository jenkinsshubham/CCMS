<?php require 'config.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>popup</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<style type="text/css">
  /* Outer */
.popup {
    width:100%;
    height:100%;
    display:none;
    position:fixed;
    top:0px;
    left:0px;
    background:rgba(0,0,0,0.75);
}
 
/* Inner */
.popup-inner {
    max-width:700px;
    width:90%;
    height:80%;
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
    box-shadow:0px 2px 6px rgba(0,0,0,1);
   
}
 
/* Close Button */
.popup-close {
    width:30px;
    height:30px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:0px;
    transition:ease 0.25s all;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:#fff;
}
 
.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
    text-decoration:none;
}
#iframe{
  width: 100%;
  height: 100%;
  overflow-y: hidden;
  border-width: 0px;
  border-radius: 5px;
}
</style>

<script>
  $(document).ready(function(){ 
    // ----- popup when not logged in
    var a= <?php if (!isset($_GET['1'])) {echo "1";} else echo "0"; ?>;
    if (a==1) {
      $('[data-popup="login"]').fadeIn(350);
      e.preventDefault();
    };
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
    var targeted_popup_class = jQuery(this).attr('data-popup-open');
      $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
      e.preventDefault();
    });
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
      var targeted_popup_class = jQuery(this).attr('data-popup-close');
      $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
      e.preventDefault();
    });
  });
</script>
</head>
<body>


<a class="btn" data-popup-open="login" href="#">Open Popup #1</a>
<div class="popup" data-popup="login">
    <div class="popup-inner">
        <iframe src="<?php echo BASEPATH?>login#login_form" id="iframe" scrolling="no"></iframe>
        <a class="popup-close" data-popup-close="login" href="#">x</a>
    </div>
</div>




</body>
</html>