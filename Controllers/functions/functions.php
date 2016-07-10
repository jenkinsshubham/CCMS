<?php

function check($db,$branch, $int){
	$q_c = $db->query("SELECT * FROM `internal` WHERE `internal_number`=$int AND `valid`=1");
	$v = $q_c->num_rows();
	$v=(int)$v;
	if($v < 1)
	{
		redirect('internal_marks_page.php?msg=14&e=1'); 
	}
  }


function findOutSubject($db,$sc, $sm){
	$a = array();
	$qr = $db->query("SELECT cycle FROM subjects WHERE sem = $sm AND code = '$sc'" );	
	$i=0;
	if($qr->num_rows() > 1){
		while($new1 = $qr->fetch_row()){
			$a[$i++] = $new1[0];
		}
	}
	else{
		$new1= $qr->fetch_row();
		return $new1[0];
	}
	return $a;

}

function findOutName($db,$sc){

	$qr = $db->query("SELECT name FROM subjects WHERE code = '$sc'" );	
	$name = $qr->fetch_row();
	$count = $qr->num_rows();
	if($count>0)
		return $name[0];
	else
		return $sc;

}

function findOutNameOfFirstYear($db,$sc){

	$qr = $db->query("SELECT name FROM subjects WHERE code = '$sc'" );	
	$name = $qr->fetch_row();
	return $name[0];

}

function getSubject($db,$sem,$branch){	
	$subject_str="";
	$ele="";
	$ele_c=0;

		$qr = $db->query("SELECT * FROM subjects WHERE sem = $sem AND branch = '$branch' order by ref");	
		while($name=$qr->fetch_array()){
			if($name['elective']==1){
				$ele_c++;
				$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['code']).")--- ".$name['name']."</span> (Elective)<br />";
			}
			else{
				$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
			}
		}
		
		return $subject_str;
	
}

function getCycle($db,$cycle){

		if($cycle == 'P')
			return "Physics";
		else if($cycle == 'C')
			return "Chemistry";
			
}

function getElectiveStatus($db,$i, $usn){
	$srt="";
	$q = $db->query("SELECT * FROM elective_status WHERE ref=$i");
	 $rows=$q->num_rows();

	if($rows > 0){

				$query1 = $db->query("SELECT elective FROM student WHERE usn='$usn'");
				$res1 = $query1->fetch_row();
				$q1 = $db->query("SELECT ele 
								  FROM elective_status 
								  WHERE code='$res1[0]'");
				$r1 = $q1->fetch_row();
				$c = $q1->num_rows();
				
				if($c > 0){
					$q = $db->query("DELETE FROM elective_status WHERE ele=$r1[0]");
					//echo "f";
					$str = "<span style='color:#FF0000'>(".$r1[0].")E</span>";
				}
				else{
					
					$query2 = $db->query("SELECT elective2	FROM student WHERE usn='$usn'");
					$res2 = $query2->fetch_row();
					$q2 = $db->query( "SELECT ele 
									  FROM elective_status 
									  WHERE code='$res2[0]'" );
					$r2 = $q2->fetch_row();
					$c1 = $q2->num_rows();
					if($c1>0){
						//echo "S";
						$q =$db->query("DELETE FROM elective_status WHERE ele=$r2[0]");
						
						$str = "<span style='color:#FF0000'>(".$r2[0].")E</span>";
					}
					else{
						$str = '-';
					}
				}

	 return $str;
	}
	else
		return " ";
}

function getElectiveForMBA($db,$i, $usn){
	$q2 = $db->query(
					   "SELECT elective 
					  	FROM student 
					  	WHERE usn='$usn'"
					  );
	$r=$q2->fetch_row();
	return "<span style='color:#FF0000'>(".$r[0].")</span>";
}


function getSubjectForInternalReport12($db,$sem, $branch, $ref){
	$str = "";
	if($branch == 'MBA' || $branch == 'MCA'){
		
		$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
	}

		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
		if($sem > 2 && $branch == 'MBA'){
				$qr = $db->query("SELECT * FROM mba_elective ");	
				while($name=$qr->fetch_assoc()){
					$str.= $name['code']."-".$name['name']."<strong>;</strong>  ";
			}
		}
		
	return $str;
}

function getSubjectForInternalReportBE12($db,$cycle, $sem, $branch, $ref){
	$str = "";
		
		$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND ref = $ref
							AND cycle = '$cycle'");
		

		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
	return $str;
}

function getSubjectForInternalReportBE345($db,$sem, $branch, $i){
		$str = "";
		$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $i");
		
		$arr = $qr->fetch_row();
		$str = $arr[0];//."(".$arr[1].")";
		
	return $str;

}

function getSubjectForInternalReportMBA($db,$sem, $branch, $ref, $cycle){
	$str = "";
	
	if($ref < 3){
		$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
	}
	else{
		$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref
							AND cycle = '$cycle'");
	}

		$arr = $qr->fetch_row();
		$str = $arr[0];//"(".$arr[1].")";
		
		
		
	return $str;
}


function getSubjectForInternalReportMCA45($db,$sem, $branch, $ref, $usn){

	$str = "";
	
	if($sem == 4){
			
			if($ref < 5 || $ref > 5){
				$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
			}
			else{
				$qr1 = $db->query(" SELECT elective 
									FROM student 
									WHERE usn = '$usn'");
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT name, code 
									FROM subjects 
									WHERE code = '$arr1[0]'
									AND ref = $ref");
			}
	}
	else if($sem == 5){
			
			if($ref < 4 || $ref > 5){
			
				$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'");
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT name, code 
									FROM subjects 
									WHERE (code = '$arr1[0]' 
									OR code = '$arr1[1]')
									AND ref = $ref");
			}
	}	

		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
	return $str;

}


function getSubjectForInternalReportBE678($db,$sem, $branch, $ref, $usn){

	$str = "";
	
	if($sem == 6){
			
			if($ref < 6 || $ref > 6){
				$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
			}
			else{
				$qr1 = $db->query(" SELECT elective 
									FROM student 
									WHERE usn = '$usn'");
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT name, code 
									FROM subjects 
									WHERE code = '$arr1[0]'
									AND ref = $ref");
			}
	}
	else if($sem == 7){
			
			if($ref < 5 || $ref > 6){
			
				$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'");
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT name, code 
									FROM subjects 
									WHERE (code = '$arr1[0]' 
									OR code = '$arr1[1]')
									AND ref = $ref");
			}
	}	
	else if($sem == 8){
			
			if($ref < 3 || $ref > 4){
			
				$qr = $db->query(" SELECT name, code 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref");
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'");
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT name, code 
									FROM subjects 
									WHERE (code = '$arr1[0]' 
									OR code = '$arr1[1]')
									AND ref = $ref");
			}
	}	
		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
	return $str;

}


function getSubject345($db,$sem, $branch, $sec){
	//echo $sem." ".$branch." ".$sec;
	$subject_str="";
	$ele="";
	$ele_c=0;
	$cycle = '';
	if($branch == 'BA')
	{
		$cycle = '-';
	}
	
	
	//$sec='-';
	$q =$db->query("DELETE FROM elective_status");

	if(($branch == 'BA' || $sem > 2) && ($branch != 'MBA') && ($branch != 'MCA')){
	
		$qr = $db->query(" SELECT code,name,elective,ref , cycle
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' AND cycle='$sec' 
							 order by `ref` ");

		while($name=$qr->fetch_assoc()){
			if($name['elective']==1){
				$ele_c++;
				$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['code']).")--- ".$name['name']."</span> (Elective)<br />";
				$q="INSERT INTO elective_status VALUES(".$name['ref'].", '".strtoupper($name['code'])."' , $ele_c )";
				$res1=$db->query($q);
			}
			else{
				//AE
				if($branch == 'AE' || $branch == 'AU'){
					$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";	
				}
				else{
					if($sec != '-'){//Second shift A and B Issue solved
					   if(($name['code'][strlen($name['code'])-1] == 'A') && $name['cycle']=='A2')
					   		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";	
					   else if($name['code'][strlen($name['code'])-1] != 'B' && $name['code'][strlen($name['code'])-1] != 'A')
							$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
					}
					else if($sec == '-'){
					   if(($name['code'][strlen($name['code'])-1] == 'B') && $name['cycle']=='-')
					   		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";	
					   else if($name['code'][strlen($name['code'])-1] != 'B' && $name['code'][strlen($name['code'])-1] != 'A')
							$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
					}
					//	$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
				}
			}
		}
		
		return $subject_str;
	
	}
	// else if(($sem < 3) && ($branch != 'MBA') && ($branch != 'MCA')){
		
	// 	$subject_str='';
	// 		$qr = $db->query("SELECT * 
	// 							FROM subjects 
	// 							WHERE sem = $sem 
	// 							AND cycle='$cycle' order by ref");	
	// 	while($name=$qr->fetch_assoc()){
		
	// 	$subject_str.= "(".$name['ref'].") --- (".$name['code'].") --- ".$name['name']."<br />";
		
	// 	}
	// 	return $subject_str;
		
	// }
	else if($branch == 'MCA'){
		
		$q =$db->query("DELETE 
						FROM elective_status");
		$qr = $db->query("SELECT code,name,elective,ref 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							order by ref ");	
		while($name=$qr->fetch_assoc()){
			if($name['elective']==1){	
				$ele_c++;
				$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['code']).") --- ".$name['name']."</span> (Elective) <br />";
				$q="INSERT INTO elective_status VALUES(".$name['ref'].",'".strtoupper($name['code'])."', $ele_c )";
				$res1=$db->query($q);
			}
			else{
				$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
			}
		}
		return $subject_str;
	
	}
	else if($branch == 'MBA'){
	
		$subject_str='';
		$qr = $db->query("SELECT * FROM subjects WHERE sem = $sem AND branch = '$branch' order by ref");	
		while($name=$qr->fetch_assoc()){
				if($name['elective'] !=1 ){
					$subject_str.= "(".$name['ref'].") ---- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
				}
		}
		if($sem > 2 && $branch == 'MBA'){
				$qr = $db->query("SELECT * FROM mba_elective ");	
				while($name=$qr->fetch_assoc()){
					$subject_str.= $name['code']."-".$name['name']."<strong>;</strong>  ";
			}
		}
		return $subject_str;	
	}
}

function getTypeSubject($db,$sc){
	$t = "T";
	$q_c = $db->query("SELECT type FROM `subjects` WHERE `code` = '$sc' and type='L'");
		$subject = $q_c->num_rows();
		if($subject != 0){
			$t = 'L';
		}
		else{
			$q_c = $db->query("SELECT type FROM `subjects` WHERE `code` = '$sc' and type='L'");		
			$subject = $q_c->num_rows();
			if($subject != 0){
				$t = "L";
			}
		}
	return $t;	
}

function GetBranch($db,$c){ 
	$q = $db->query("SELECT name FROM branches WHERE code = '$c'");
	$r = $q->fetch_row();
	return $r[0];
}

function getSec($db,$sec, $cycle){
	
	if($cycle=='P')
	{
		if ($sec == 'A'){
			$sec = 'B1';
		}
		else if ($sec == 'B'){
			$sec = 'B2';
		}
		else if ($sec == 'C'){
			$sec = 'B3';
		}
		else if ($sec == 'D'){
			$sec = 'B4';
		}
		else if ($sec == 'E'){
			$sec = 'B5';
		}
		else if ($sec == 'F'){
			$sec = 'B6';
		}
	}
	else if($cycle=='C')
	{
		if ($sec == 'A'){
			$sec = 'A1';
		}
		else if ($sec == 'B'){
			$sec = 'A2';
		}
		else if ($sec == 'C'){
			$sec = 'A3';
		}
		else if ($sec == 'D'){
			$sec = 'A4';
		}
		else if ($sec == 'E'){
			$sec = 'A5';
		}
		else if ($sec == 'F'){
			$sec = 'A6';
		}
	}
	return $sec;
}

function getSubjectName($db,$c){
	$q = $db->query("SELECT name FROM subjects WHERE code = '$c'");
	$count = $q->num_rows();
		
		if($count)
		{
		$r = $q->fetch_row();
		}
		else
		{
			//echo $c;
			$q = $db->query("SELECT name FROM subjects WHERE code = '$c'");
			$r = $q->fetch_row();
		}
	return $r[0];
}

function delete_student($db,$codes){
	$count = count($codes);
			$i = 0;
				foreach($codes as $code)
				{
					$qr1="DELETE FROM student WHERE `usn`='$code'";
						$result=$db->query($qr1);
					$qr1="DELETE FROM first_internal WHERE `usn`='$code'";
						$result=$db->query($qr1);
					$qr1="DELETE FROM second_internal WHERE `usn`='$code'";
						$result=$db->query($qr1);
						$qr1="DELETE FROM third_internal WHERE `usn`='$code'";
						$result=$db->query($qr1);
					$i++;
				}
				if($count == $i)
					redirect('delete_student.php?msg=20&e=0');
				else
					redirect('delete_student.php?msg=6&e=1');
}

function delete_faculty($db,$codes){
	$count = count($codes);
			$i = 0;
		foreach($codes as $f)
		{		
			$i++;
			$query="DELETE 
					FROM log_f
					WHERE fid = '$f'";
			$r=$db->query($query);
			
			$q=$db->query("SELECT * FROM subject_entry WHERE fid = '$f'");
			
			if($r=$q->num_rows()){
				$query="DELETE FROM subject_entry
						WHERE fid = '$f'";
				$r=$db->query($query);
			}
		}
		if($count == $i)
					redirect('admin_remove_fac.php?msg=27&e=0');
				else
					redirect('admin_remove_fac.php?msg=6&e=1');
}

function getFacName($db,$fid){
	$qr = "SELECT name FROM log_f WHERE fid='".$fid."'";
	$qry1 = $db->query($qr);
	$r = $qry1->fetch_row();
	return $r[0];
}

function getStudentName($db,$u){
	$qr = "SELECT name FROM student WHERE usn='".$u."'";
	$qry1 = $db->query($qr);
	$r = $qry1->fetch_row();
	return $r[0];
}

function getSems($db,$cat){
		$be 	= array(3,4,5,6,7,8);
		$mtech	= array(1,2,3);
		$mca 	= array(1,2,3,4,5,6);
		if($cat == 'BE')
			return $be;	
		else if($cat == 'MCA')
			return $mca;
		else
			return $mtech;
}

function subjectListForSelection($db,$str,$type){
	$HTMLlist="";
	foreach($str as $branch=>$cat){
				$HTMLlist .='<optgroup label="'.GetBranch($db,$branch).'">';
				$sem = getSems($db,$cat);
				foreach($sem as $sm){
					$HTMLlist .='<optgroup label="'.$sm.' sem">';
							 $qr = "SELECT * FROM subjects WHERE branch='".$branch."' and sem=".$sm." and type='$type'";
							 $qry1 = $db->query($qr);
				
							 while($arr = $qry1->fetch_assoc())
							 {
								$HTMLlist .="<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
							 }
					$HTMLlist .='</optgroup>';
				}
				$HTMLlist .='</optgroup>';
			}	
			$str = array('P', 'C');
			foreach($str as $s){
				$HTMLlist .='<optgroup label="'.getCycle($db,$s).'">';
				$sem = array(1,2);
				foreach($sem as $sm){
					$HTMLlist .='<optgroup label="'.$sm.' sem">';
							 $qr = "SELECT * FROM subjects WHERE branch='".$s."' and sem=$sm and type='$type'";
							 $qry1 = $db->query($qr);
				
							 while($arr = $qry1->fetch_assoc())
							 {
								$HTMLlist .="<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
							 }
					$HTMLlist .='</optgroup>';
				}
				$HTMLlist .='</optgroup>';
			}	
		return $HTMLlist;
}

function firstYearProgramPC($db,$type){
	$str = array('P', 'C');
	$HTMLlist="";
	foreach($str as $s){
		$HTMLlist .='<optgroup label="'.getCycle($db,$s).'">';
		$sem = array(1,2);
		foreach($sem as $sm){
			$HTMLlist .='<optgroup label="'.$sm.' sem">';
			$qr = "SELECT * FROM subjects WHERE branch='$s' AND sem='$sm' AND type='$type'";
			$qry1 = $db->query($qr);
			while($arr = $qry1->fetch_assoc()){
				$HTMLlist .="<option value='".$arr['code']."'>(".$arr['code'].")".$arr['name']."</option>";
			}
			$HTMLlist .='</optgroup>';
		}
		$HTMLlist .='</optgroup>';
	}
	return $HTMLlist;
}
?>
