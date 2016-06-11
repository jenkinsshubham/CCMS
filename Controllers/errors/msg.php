<?php
if(isset($_SESSION['_m'])){?>
	<div class="alert alert-<?php 
		if($_SESSION['_t']=='d') echo "danger"; 
		if($_SESSION['_t']=='w') echo "warning"; 
		if($_SESSION['_t']=='s') echo "success"; 
		if($_SESSION['_t']=='i') echo "info"; 
		?>
		">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                    <center>
               <span class="glyphicon glyphicon-<?php 
						if($_SESSION['_t']=='d') echo "exclamation-sign"; 
						if($_SESSION['_t']=='w') echo "bell"; 
						if($_SESSION['_t']=='s') echo "ok-circle"; 
						if($_SESSION['_t']=='i') echo "info-sign"; 
						?>
               		"></span> <strong>
					<?php echo $_SESSION["_m"]; ?>
				</strong>
				<?php if(isset($_SESSION['_mb'])){?>
				<hr class="message-inner-separator">
                <p>
                   <?php echo $_SESSION["_mb"]; ?> </p></center>
                <?php }?>
    </div>
<?php 
	$_SESSION["_m"] = null; // Clean up
	$_SESSION["_mb"] = null; // Clean up
	$_SESSION["_t"] = null; // Clean up
}
?>
