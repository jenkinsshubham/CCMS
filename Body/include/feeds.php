<div id="container">
    <div id="content" class="scroll-pane">
        <div id="itemlist">
            <?php $i=1; while($notice=$feeds->fetch_array()){ ?> 
                <div class="feed_item">
                    <div class="feed_item_title">
                        <a class="btn" data-popup-open="popup-<?php echo $i ?>" href="#"><b><?php echo $notice['title'] ?></b></a>
                    </div>
                    <div class="feed_item_description"><?php echo $notice['content'] ?></div>
                    <div class="feed_item_date"><?php echo $notice['_time'] ?></div>
                </div>
                       <!-- POPUP NOTICE -->
                <div class="popup" data-popup="popup-<?php echo $i ?>">
                    <div class="popup-inner">
                        <div style="background: #fff;height: 100%;width: 100%;border-radius:8px;padding: 10px;">
                        	<div class="panel panel-warning">
	                            <div class="panel-heading"><big class="panel-title"><b><?php echo $notice['title'] ?></b></big></div>
	                            <div class="panel-body"><h4><?php echo $notice['content'] ?></h4></div>
	                            <hr/>
	                            <p><i> Published by: <?php echo $notice['publisher'] ?></i></p>
	                            <p><i> Time: <?php echo $notice['_time'] ?></i></p>
	                        </div>
                        </div>
                        <a class="popup-close" data-popup-close="popup-<?php echo $i ?>" href="#">x</a>
                    </div>
                </div>
            <?php ; $i++; } ?>
        </div><!--#itemlist-->
    </div><!--#content and #flexcroll-->
</div><!--#container-->