<div id="aa">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>My Subjects</h2>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		    <div class="bar-chart">
		        <div class="chart clearfix">
		            <div class="item">
		                <div class="bar">
		                    <span class="percent"><?php echo 'T' ?></span>
		                    <div class="item-progress" data-percent="91">
		                        <span class="title"><?php echo "Mathematics" ?></span>
		                    </div>
		                </div>
		               </div>
		               <div class="item">
		                <div class="bar">
		                    <span class="percent"><?php echo 'L' ?></span>
		                    <div class="item-progress" data-percent="91">
		                        <span class="title"><?php echo "Physics Lab" ?></span>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>




	<script type="text/javascript">
	$(document).ready(function(){
	    barChart();
	    
	    $(window).resize(function(){
	        barChart();
	    });
	    
	    function barChart(){
	        $('.bar-chart').find('.item-progress').each(function(){
	            var itemProgress = $(this),
	            itemProgressWidth = $(this).parent().width() * ($(this).data('percent') / 100);
	            itemProgress.css('width', itemProgressWidth);
	            if(($(this).data('percent'))<85) {itemProgress.css('background-color', '#670000')};
	        });
	    };
	});
	</script>