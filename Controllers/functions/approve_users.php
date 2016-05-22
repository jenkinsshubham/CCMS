<?php
if(isset($level)){

	
	$t=($selected=='approveF')?'f':'s';

	$sql="SELECT * FROM log_";
	$sql .= ($t=='f') ? "f" : "s" ;
	$sql .= " WHERE flag=0";

	$users=$db->query($sql);




$s="SELECT * FROM log_s ";
$f="SELECT * FROM log_f ";
$q="WHERE flag=0";

$query1=$db->query($f.$q);
$query2=$db->query($s.$q);

$ns=$query2->num_rows;
$nf=$query1->num_rows;


if(isset($_POST['btn'])){ 
	$un=$db->real_escape_string($_POST['un']);
	if($_POST['btn']=='a'){
		$a="UPDATE `log_";
		$a .= ($t=='s') ? "s" : "f" ;	 
		$a.="` SET `flag` = '1' WHERE `log_";
		$a .= ($t=='s') ? "s" : "f" ;
		$a.="`.`username` = '".$un."'";
		if($db->query($a))
		echo "<script>alert('Approved')</script>";
		header("Location: ".$selected);
	}
}




}


?>
