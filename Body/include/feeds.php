<div id="container">
    <div id="content" class="scroll-pane">
        <div id="itemlist">
            <?php $i=1; while($notice=$feeds->fetch_array()){ ?> 
                <div class="feed_item">
                    <div class="feed_item_title">
                        <a class="btn" data-popup-open="popup-<?php echo $i ?>" href="#"><b><?php echo $notice['title'] ?></b></a>
                    </div>
                    <div class="feed_item_description"><?php echo $notice['content'] ?></div>
                    <div class="feed_item_date">Publisher: <<?php echo $notice['publisher'] ?></div>
                    <div class="feed_item_date"><?php echo $notice['time'] ?></div>
                </div>
                </div><!--#itemlist-->
                       <!-- POPUP NOTICE -->
                <div class="popup" data-popup="popup-<?php echo $i ?>">
                    <div class="popup-inner">
                        <div style="background: #fff;height: 100%;width: 100%;border-radius:8px;padding: 10px;">
                            <h1><b><?php echo $notice['title'] ?></b></h1>
                            <div style="width: 80%"><?php echo $notice['content'] ?></div>
                            <p><i><?php echo $notice['time'] ?></i></p>
                        </div>
                        <a class="popup-close" data-popup-close="popup-<?php echo $i ?>" href="#">x</a>
                    </div>
                </div>
            <?php ; $i++; } ?>
    </div><!--#content and #flexcroll-->
    <div id="footer"></div>
</div><!--#container-->