<?php
	
function list_fac_sub_select($db,$fid){
		$sql="SELECT * FROM subject_entry ";
		$sql.="WHERE fid='$fid'";
		$res=$db->query($sql);
		if(!$res) echo "SOme Error!";

		$opt="";

		while ($r=$res->fetch_array()) {
			$opt.="<optgroup label='Theory'>";
			for($i=1;$i<=$r['noofsubjects'];$i++){
				$sub="subject".$i;
	            $opt.="<option>$r[$sub]</option>";
        	}
	        $opt.="</optgroup>";$opt.="<optgroup label='Lab'>";
			for($i=1;$i<=$r['nooflabs'];$i++){
				$sub="lab".$i;
	            $opt.="<option>$r[$sub]</option>";
	    	}
        return $opt;
        }
}


?>