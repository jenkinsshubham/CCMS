<?php

function list_fac_sub($db,$fid){
		$sql="SELECT * FROM subject_entry WHERE fid='$fid'";
		$res=$db->query($sql);
		if(!$res) echo "SOme Error!";

		$opt="";
		if($res->num_rows==0){
			$_SESSION['_m']="No subjects chosen!";
			$_SESSION['_mb']="Please choose your subjects now.<br/>";
			$_SESSION['_mb'].="$content<br/>";
			$_SESSION['_t']='d';
			$opt.="<script>window.location.assign('".BASEPATH."page/subjectEntry');</script>";
		}
		else{
			while ($r=$res->fetch_array()) {
				for($i=1;$i<=$r['noofsubjects'];$i++){
					$sub="subject".$i;
					$opt.="<div class=\"item\"><div class=\"bar\"><span class=\"percent\">T</span><div class=\"item-progress\" data-percent=\"91\">";
		            $opt.="<span class=\"title\">$r[$sub]</span></div></div></div>";
	        	}
		        $opt.="<br/>";
				for($i=1;$i<=$r['nooflabs'];$i++){
					$sub="lab".$i;
					$opt.="<div class=\"item\"><div class=\"bar\"><span class=\"percent\">L</span><div class=\"item-progress\" data-percent=\"91\">";
		            $opt.="<span class=\"title\">$r[$sub]</span></div></div></div>";
		    	}
	        }
	    }
    return $opt;
}
?>