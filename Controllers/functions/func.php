<?php

function fetch_branches($demand,$db,$id)
{
	$sqlc="SELECT COUNT(*) FROM branches";
	$sql="SELECT * FROM branches WHERE id='$id'";
	$resultc=$db->query($sqlc);
	$result=$db->query($sql);
	$row=$result->fetch_array();
	$rowc=$resultc->fetch_array();
	if($demand=='count')return $rowc['COUNT(*)'];
	if($demand=='name')return $row['name'];
	if($demand=='code')return $row['code'];
}

function fetch_subjects($demand,$db,$br)
{
	$sqlc="SELECT COUNT(*) FROM subjects";
	$sql="SELECT * FROM subjects";
	$sql.=" WHERE branch='$br' AND cycle='-' ORDER BY ref";
	$resultc=$db->query($sqlc);
	$result=$db->query($sql);
	$row=$result->fetch_array();
	$rowc=$resultc->fetch_array();
	if($demand=='count')return $rowc['COUNT(*)'];
	if($demand=='name')return $row['sname'];
	if($demand=='code')return $row['scode'];
}

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
