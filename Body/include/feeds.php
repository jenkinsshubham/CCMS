<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo STYLERS ?>js/feeds.js"></script>


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
        </div><!--#itemlist-->
    </div><!--#content and #flexcroll-->
    <div id="footer"></div>
</div><!--#container-->





<script type="text/javascript">
    $(function() {
        //----- OPEN
        $('[data-popup-open]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-open');
            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
            $(".header-wrapper").css("z-index","0");
            $(".bar").css("z-index","0");
            $(".item-progress").css("z-index","0");
            $(".column-chart").css("z-index","0");

            e.preventDefault();
        });

        //----- CLOSE
        $('[data-popup-close]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-close');
            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
            $(".header-wrapper").css("z-index","100");
            $(".bar").css("z-index","5");
            $(".item-progress").css("z-index","10");

            e.preventDefault();
        });
    });
</script>