<?php
ini_set('display_errors',1); 
 error_reporting(E_ALL);
$results="";

if(isset($_GET['key'])||isset($_POST['key'])){
	$_frm=(isset($frm))?($frm=='s'?'f':'s'):'f';
	$tbl="log_".$_frm;
	$key=(isset($_GET['key']))?$db->real_escape_string($_GET['key']):$db->real_escape_string($_POST['key']);
	    $array = array();

		$result=$db->query("select * from $tbl where name LIKE '%{$key}%'");
		if($result->num_rows>0){
		    while($row=$result->fetch_array()){
		    	$results.="<a href=\"".BASEPATH."profile/".$row['username']."\">";

		    	// AVATAR
				$_img=$row['img'];
				$__sex=$row['sex'];
					if(empty($_img)){
						$_avatar = STYLERS.'images/avatars/';
							if ($_frm=='s') {
								$_avatar .= ($__sex=='M') ? 'sm' : 'sf' ;
							}
							else $_avatar .= ($__sex=='M') ? 'fm' : 'ff' ;
							$_avatar.='.png';
						
						}
					else {if(!empty($_img)) $_avatar="../User_Uploads/profile/".$_img;}
					$s_e_m=($_frm=='s')?("sem:".$row['sem']." branch:"):"";
				$results.="<div><img alt=\"User Pic\" src=\"".$_avatar."\" style=\"width:50px;height:50px;\" class=\"img-circle\"> ";
				$results.=$row['name']." <small>(".$s_e_m.$row['br'].")</small> </div></a><hr/>";
			}
		}
		else {
			$results.="No results found!";
		}


}
?>