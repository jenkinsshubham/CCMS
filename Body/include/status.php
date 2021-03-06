+<?php

require '../Controllers/functions/subject_count.php';


$exam="internal_";
$exam.=(isset($_POST['exam']))?$db->real_escape_string($_POST['exam']):'4';
	$sql=" SELECT *";
	$sql.=" FROM $exam";
	$sql.=" WHERE usn='$id'";

	$result=$db->query($sql);

	if (!$result) {
		die('There was an error running the query ['.$db->error.']');
	}

	$status=$result->fetch_array();	

?>


<div id="aa">
<div class="pull-right">
<form method="post">
<div class="input-group">
    <select name="exam" style="border-radius:0px" class="form-control input-sm">
        <option <?= $exam == 'internal_1' ? ' selected="selected"' : '';?> value="1">1st internal</option>
        <option <?= $exam == 'internal_2' ? ' selected="selected"' : '';?> value="2">2nd internal</option>
        <option <?= $exam == 'internal_3' ? ' selected="selected"' : '';?> value="3">3rd internal</option>
        <option <?= $exam == 'internal_4' ? ' selected="selected"' : '';?> value="4">Preparatory</option>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-primary btn-sm" type="submit">
        <span class="glyphicon glyphicon-refresh"></span>
      </button>
    </span>
</div>
</form>
</div>
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
            <?php if($result->num_rows==0){ 
                         echo "<span style=\"color:#de0000;font-style:italic\">Attendence not yet uploaded for $exam<br/><a href='#'>Check Previous</a></span>"
                            ;}
            else{?>
            <div class="bar-chart">
                <div class="legend">
                    <div class="item">
                        <h4></h4>
                    </div>
                    <!-- //.item -->
                    
                    <div class="item">
                        <h4>Shortage</h4>
                    </div>
                    <!-- //.item -->
                    
                    <div class="item text-right">
                        <h4></h4>
                    </div>
                    <!-- //.item -->
            
                    <div class="item text-right">
                        <h4>Super</h4>
                    </div>
                    <!-- //.item -->
                </div>
                <!-- //.legend -->
                
                <div class="chart clearfix">

	                <?php for($i=1; $i <= $q_sub; $i++) { 
	                	$att=$i.'a';
						$q="SELECT *";
						$q.=" FROM `subjects`";
						$q.=" WHERE branch=";
						$q.="'$br'";
						$q.=" AND sem='$sem'";
	                	$q.=" AND ref='$i'";
	                	$sresult=$db->query($q);

	                	$sub=$sresult->fetch_array();	

	                	
	                	?>
	                	
		                    <div class="item">
		                        <div class="bar">
		                            <span class="percent"><?php echo $status[$att] ?>%</span>
		            
		                            <div class="item-progress" data-percent="<?php echo $status[$att] ?>">
		                                <span class="title"><?php echo $sub['sname'] ?></span>
		                            </div>
		                            <!-- //.item-progress -->
		                        </div>
		                        <!-- //.bar -->
		                    </div>
	                 	<?php } ?>
	                    <!-- //.item -->
                    
                    
                </div>
                <!-- //.chart -->
            </div>
            <!-- //.bar-chart -->
            <?php ;}?>
        </div>
        <!-- //.col-md-4 -->
    </div>
    <!-- //.row -->
</div>
<!-- //.container -->


<!-- MARKS GRAPH -->

<div id="aa">
	<div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>Marks</h2>
            </div>
            <!-- //.text-center -->
            
    <?php
        if($result->num_rows==0){ 
                         echo "<span style=\"color:#de0000;font-style:italic\">Attendence not yet uploaded for $exam<br/><a href='#'>Check Previous</a></span>"
                            ;}
                            else{?>
            <div class="column-chart">
            
                <div class="chart clearfix">

	                <?php for($i=1; $i <= $q_sub; $i++) { 
	                	$mrk=$i.'m';
						$q="SELECT *";
						$q.= " FROM `subjects`";
						$q.=" WHERE branch='$br'";
						$q.=" AND sem='$sem'";
	                	$q.=" AND ref='$i'";
	                	$sresult=$db->query($q);

	                	$sub=$sresult->fetch_array();	


	                	?>
                    <div class="item">
                        <div class="bar">
                            <span class="percent"><?php echo $status[$mrk] ?></span>
            
                            <div class="item-progress" data-percent="<?php echo $status[$mrk] ?>">
                                <span class="title"><?php echo $sub['sname'] ?></span>
                            </div>
                            <!-- //.item-progress -->
                        </div>
                        <!-- //.bar -->
                    </div>
                    <!-- //.item -->
            		<?php } ?>
                    
                </div>
                <!-- //.chart -->
            </div>
            <!-- //.column-chart -->
        <?php }?>
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
	            if(($(this).data('percent'))<85) {itemProgress.css('background-color', '#670000')};
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
            itemProgressHeight = $(this).parent().height() * ($(this).data('percent') / 20);
            itemProgress.css('height', itemProgressHeight);
        });
    };
});
	</script>