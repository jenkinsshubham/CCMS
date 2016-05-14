
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
