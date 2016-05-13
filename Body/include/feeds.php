<?php 
require_once '../config.inc.php';
require_once('../../Controllers/config/database.php');
    $sql=" SELECT * FROM notice";

$result=$db->query($sql);

    if (!$result) {
        die('There was an error running the query ['.$db->error.']');
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News | SIT</title>    
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo STYLERS.'js/feeds.js'?>"></script>
<link href="<?php echo STYLERS.'css/feeds.css'?>" rel='stylesheet'></script>

</head>
<body>
<!-- off cache -->
<div id="container">
    <div id="content" class="scroll-pane">
        <div id="itemlist">

<?php while($notice=$result->fetch_array()){ ?> 
            <div class="feed_item">
                <div class="feed_item_title"><a href="" target="_blank" rel="nofollow"><?php echo $notice['title'] ?></a></div>
                <div class="feed_item_description"><?php echo $notice['content'] ?></div>
                <div class="feed_item_date"><b>Publisher: </b><?php echo $notice['publisher'] ?></div>
                <div class="feed_item_date">J<?php echo $notice['time'] ?></div>
            </div>
<?php } ?>



        </div><!--#itemlist-->
    </div><!--#content and #flexcroll-->
    <div id="footer"></div>
</div><!--#container-->

</body>
</html>
