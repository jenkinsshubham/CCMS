<?php
require_once('../Controllers/config/database.php');
//ID
$id = ($_SESSION['id']);

$exam='internal_1';

$sql=" SELECT *";
$sql.=" FROM $exam";
$sql.=" WHERE usn='$id'";

$result=$db->query($sql);

if (!$result) {
	die('There was an error running the query ['.$db->error.']');
}

// FETCHING
$status=$result->fetch_array();	
echo "usn: ".$status['usn']."<br/>"


?>


<div id="aa">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>My Attendence</h2>
            </div>
            <!-- //.text-center -->
        </div>
        <!-- //.col-md-12 -->
    </div>
    <!-- //.row -->
    
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="bar-chart">
                <div class="legend">
                    <div class="item">
                        <h4>Poor</h4>
                    </div>
                    <!-- //.item -->
                    
                    <div class="item">
                        <h4>Average</h4>
                    </div>
                    <!-- //.item -->
                    
                    <div class="item text-right">
                        <h4>Good</h4>
                    </div>
                    <!-- //.item -->
            
                    <div class="item text-right">
                        <h4>Super</h4>
                    </div>
                    <!-- //.item -->
                </div>
                <!-- //.legend -->
                
                <div class="chart clearfix">
                    <div class="item">
                        <div class="bar">
                            <span class="percent">92%</span>
            
                            <div class="item-progress" data-percent="92">
                                <span class="title">Maths</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
                    
                    <div class="item">
                        <div class="bar">
                            <span class="percent">71%</span>
            
                            <div class="item-progress" data-percent="71">
                                <span class="title">Chemistry</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
                    
                    <div class="item">
                        <div class="bar">
                            <span class="percent">82%</span>
            
                            <div class="item-progress" data-percent="82">
                                <span class="title">C Programming</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">67%</span>
            
                            <div class="item-progress" data-percent="67">
                                <span class="title">EVS</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
                </div>
                <!-- //.chart -->
            </div>
            <!-- //.bar-chart -->
        </div>
        <!-- //.col-md-4 -->
    </div>
    <!-- //.row -->
</div>
<!-- //.container -->




<div id="aa">
	<div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>Marks</h2>
            </div>
            <!-- //.text-center -->
            
            <div class="column-chart">
                <div class="legend legend-left hidden-xs">
                    <h3 class="legend-title">ME</h3>
                </div>
                <!-- //.legend -->
            
                <div class="legend legend-right hidden-xs">
                    <div class="item">
                        <h4>Excellent</h4>
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <h4>Good</h4>
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <h4>Average</h4>
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <h4>Poor</h4>
                    </div>
                    <!-- //.item -->
                </div>
                <!-- //.legend -->
            
                <div class="chart clearfix">
                    <div class="item">
                        <div class="bar">
                            <span class="percent">92%</span>
            
                            <div class="item-progress" data-percent="92">
                                <span class="title">Maths</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">61%</span>
            
                            <div class="item-progress" data-percent="71">
                                <span class="title">Chemistry</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">98%</span>
            
                            <div class="item-progress" data-percent="82">
                                <span class="title">C Programming</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">78%</span>
            
                            <div class="item-progress" data-percent="58">
                                <span class="title">CAED</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            
                    <div class="item">
                        <div class="bar">
                            <span class="percent">67%</span>
            
                            <div class="item-progress" data-percent="67">
                                <span class="title">EVS</span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
                </div>
                <!-- //.chart -->
            </div>
            <!-- //.column-chart -->
        </div>
        <!-- //.col-md-6 -->
    </div>
    <!-- //.row -->
</div>
<!-- //.container -->








<!-- //.container -->
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
        });
    };
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    columnChart();
    
    function columnChart(){
        var item = $('.chart', '.column-chart').find('.item'),
        itemWidth = 100 / item.length;
        item.css('width', itemWidth + '%');
        
        $('.column-chart').find('.item-progress').each(function(){
            var itemProgress = $(this),
            itemProgressHeight = $(this).parent().height() * ($(this).data('percent') / 100);
            itemProgress.css('height', itemProgressHeight);
        });
    };
});
</script>