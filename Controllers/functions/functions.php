<?php

$message = array("
					Please select proper Semester and Subject...",	//0
				 	"Marks and attendance updated...",					//1
					"Attendance should be number...",				//2
					"You have successfully selected the subject....",//3
					"Dont change others password..",				//4
					"Password changed...",							//5
					"DB error..",								//6
					"Wrong id or password..",
					"Password entered is not same..",
					"Login to view the faculty profile",
					"Wrong username or password.",	//10
					"Subjects not changed..",
					"Not found this id or email in database",//12
					"Password will be sent to entered Email address. It may take some time.", //13
					"You can't enter marks for this internal... Because time is expired (You have to enter within given time). Time will be displayed in notice. Please contact admin..",
					"Attendance and marks value should be in the range",
					"Registration successful..",
					"Sucessfully entered..",			//17
					"Existing student.. Student entry failed..",
					"Select atleast one student...",
					"Students are removed",     //20
					"Exists in database",
					"Select atleast one subject", //22
					"Subject name changed..",
					"Subject is removed..",
					"Branch and semister not matching. The semister you have entered doesnt have elective subject", //25
					"Student detail not found..",
					"Faculty is removed",
					"Faculty Confirmed.", //28
					"Please select atleast one faculty.", //29
					"Password recovery process is failed.. Contact admin..",
					"Select atleast one faculty to delete",
					"Fill all the fields",//32
					"Data successfully updated",
					"Password and username sent to your mail id.."
					);									
					

function check($db,$branch, $int){
  if(($branch != 'MBA') && ($branch != 'MCA')){ 
	$q_c = $db->query("SELECT * FROM `internal` WHERE `internal_number`=$int AND `valid`=1");
	$v = $q_c->num_rows();
	$v=(int)$v;
	if($v < 1)
	{
		redirect('internal_marks_page.php?msg=14&e=1'); 
	}
  }
  else if($branch == 'MBA')
  { 
	$q_c = $db->query("SELECT * FROM `internal_mba` WHERE `internal_number`=$int AND `valid`=1");
	$v = $q_c->num_rows();
	$v=(int)$v;
	if($v < 1)
	{
		redirect('internal_marks_page.php?msg=14&e=1');
	}
  }
  else if($branch == 'MCA'){ 
	$q_c = $db->query("SELECT * FROM `internal_mca` WHERE `internal_number`=$int AND `valid`=1");
	$v = $q_c->num_rows();
	$v=(int)$v;
	if($v < 1)
	{
		redirect('internal_marks_page.php?msg=14&e=1');
	}
  }
}

function redirect($url,$permanent = false)
{
	if($permanent)
	{
		header('HTTP/1.1 301 Moved Permanently');
	}
	header('Location: '.$url);
	exit();
}

function findOutSubject($db,$sc, $sm){
	$a = array();
	$qr = $db->query("SELECT cycle FROM subjects WHERE sem = $sm AND scode = '$sc'" )or die($db->error());	
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

	$qr = $db->query("SELECT sname FROM subjects WHERE scode = '$sc'" )or die($db->error());	
	$name = $qr->fetch_row();
	$count = $qr->num_rows();
	if($count>0)
		return $name[0];
	else
		return $sc;

}

function findOutNameOfFirstYear($db,$sc){

	$qr = $db->query("SELECT name FROM 1yr_subjects WHERE code = '$sc'" )or die($db->error());	
	$name = $qr->fetch_row();
	return $name[0];

}

function getSubject($db,$sem, $branch, $cycle){	
	$subject_str="";
	$ele="";
	$ele_c=0;
	$q =$db->query("DELETE FROM elective_status")or die($db->error());

	if(($sem > 2) && ($branch != 'MBA') && ($branch != 'MCA') && ($branch != 'SCS') && ($branch != 'SCN')  && ($branch != 'LDE') && ($branch != 'MTP')  && ($branch != 'MAR') && ($branch != 'LVS')){
	
		$qr = $db->query("SELECT scode,sname,elective,ref FROM subjects WHERE sem = $sem AND branch = '$branch' order by ref")or die($db->error());	
		while($name=$qr->fetch_assoc()){
		if($name['elective']==1){
			$ele_c++;
			$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['scode']).")--- ".$name['sname']."</span> (Elective)<br />";
			$q="INSERT INTO elective_status VALUES(".$name['ref'].",'".strtoupper($name['scode'])."', $ele_c )";
			$res1=$db->query($q)or die($db->error());
		}
		else{
		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
		}
		}
		
		return $subject_str;
	
	}
	else if(($sem < 3) && ($branch != 'MBA') && ($branch != 'MCA')  && ($branch != 'SCS') && ($branch != 'SCN') && ($branch != 'LDE') && ($branch != 'MTP') && ($branch != 'MAR') && ($branch != 'LVS')){
		
		$subject_str='';
			$qr = $db->query("SELECT * 
								FROM 1yr_subjects 
								WHERE sem = $sem 
								AND cycle='$cycle' order by ref");	
		while($name=$qr->fetch_assoc()){
		
		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['code']).") --- ".$name['name']."<br />";
		
		}
		return $subject_str;
		
	}
	else if($branch == 'MCA'){
		
		$q =$db->query("DELETE FROM elective_status")or die($db->error());
		$qr = $db->query("SELECT scode,sname,elective,ref 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							order by ref ")or die($db->error());	
		while($name=$qr->fetch_assoc()){
		if($name['elective']==1){	
			$ele_c++;
			$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['scode']).") --- ".$name['sname']."</span> (Elective) <br />";
			$q="INSERT INTO elective_status VALUES(".$name['ref'].",'".strtoupper($name['scode'])."', $ele_c )";
			$res1=$db->query($q)or die($db->error());
		}
		else{
		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
		}
		}
		return $subject_str;
	
	}
	else if($branch == 'MBA'){
	
		$subject_str='';
		$qr = $db->query("SELECT * FROM subjects WHERE sem = $sem AND branch = '$branch' order by ref")or die($db->error());	
		while($name=$qr->fetch_assoc()){
				if($name['elective'] !=1 ){
					$subject_str.= "(".$name['ref'].") ---- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
				}
		}
		if($sem > 2 && $branch == 'MBA'){
				$qr = $db->query("SELECT * FROM mba_elective ")or die($db->error());	
				while($name=$qr->fetch_assoc()){
					$subject_str.= "<strong>".strtoupper($name['code'])."</strong> - ".$name['name']."<strong>; </strong> ";
			}
		}
		return $subject_str;	
	}
	else if(($branch == 'SCS') || ($branch == 'SCN') ||  ($branch == 'LDE') || ($branch == 'MTP') || ($branch == 'MAR') || ($branch == 'LVS')) 
	{
		$q =$db->query("DELETE FROM elective_status")or die($db->error());
		$qr = $db->query("SELECT scode,sname,elective,ref 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							order by ref ")or die($db->error());	
		while($name=$qr->fetch_assoc()){
		if($name['elective']==1){	
			$ele_c++;
			$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['scode']).") --- ".$name['sname']."</span> (Elective) <br />";
			$q="INSERT INTO elective_status VALUES(".$name['ref'].",'".strtoupper($name['scode'])."', $ele_c )";
			$res1=$db->query($q)or die($db->error());
		}
		else{
		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
		}
		}
		return $subject_str;
	}
}

function getCycle($db,$cycle){

		if($cycle == 'P')
			return "Physics";
		else if($cycle == 'C')
			return "Chemistry";
			
}

function getElectiveStatus($db,$i, $usn){
	$srt="";
	$q = $db->query("SELECT * FROM elective_status WHERE ref=$i")or die($db->error());
	 $rows=$q->num_rows();

	if($rows > 0){

				$query1 = $db->query("SELECT elective FROM student WHERE usn='$usn'")or die($db->error());
				$res1 = $query1->fetch_row();
				$q1 = $db->query("SELECT ele 
								  FROM elective_status 
								  WHERE code='$res1[0]'")or die($db->error());
				$r1 = $q1->fetch_row();
				$c = $q1->num_rows();
				
				if($c > 0){
					$q = $db->query("DELETE FROM elective_status WHERE ele=$r1[0]")or die($db->error());
					//echo "f";
					$str = "<span style='color:#FF0000'>(".$r1[0].")E</span>";
				}
				else{
					
					$query2 = $db->query("SELECT elective2	FROM student WHERE usn='$usn'")or die($db->error());
					$res2 = $query2->fetch_row();
					$q2 = $db->query( "SELECT ele 
									  FROM elective_status 
									  WHERE code='$res2[0]'" );
					$r2 = $q2->fetch_row();
					$c1 = $q2->num_rows();
					if($c1>0){
						//echo "S";
						$q =$db->query("DELETE FROM elective_status WHERE ele=$r2[0]")or die($db->error());
						
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
					  )or die($db->error());
	$r=$q2->fetch_row();
	return "<span style='color:#FF0000'>(".$r[0].")</span>";
}


function getSubjectForInternalReport12($db,$sem, $branch, $ref){
	$str = "";
	if($branch == 'MBA' || $branch == 'MCA'){
		
		$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
	}

		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
		if($sem > 2 && $branch == 'MBA'){
				$qr = $db->query("SELECT * FROM mba_elective ")or die($db->error());	
				while($name=$qr->fetch_assoc()){
					$str.= $name['code']."-".$name['name']."<strong>;</strong>  ";
			}
		}
		
	return $str;
}

function getSubjectForInternalReportBE12($db,$cycle, $sem, $branch, $ref){
	$str = "";
		
		$qr = $db->query(" SELECT name, code 
							FROM 1yr_subjects 
							WHERE sem = $sem 
							AND ref = $ref
							AND cycle = '$cycle'")or die($db->error());
		

		$arr = $qr->fetch_row();
		$str = $arr[0]."(".$arr[1].")";
		
	return $str;
}

function getSubjectForInternalReportBE345($db,$sem, $branch, $i){
		$str = "";
		$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $i")or die($db->error());
		
		$arr = $qr->fetch_row();
		$str = $arr[0];//."(".$arr[1].")";
		
	return $str;

}

function getSubjectForInternalReportMBA($db,$sem, $branch, $ref, $cycle){
	$str = "";
	
	if($ref < 3){
		$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
	}
	else{
		$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref
							AND cycle = '$cycle'")or die($db->error());
	}

		$arr = $qr->fetch_row();
		$str = $arr[0];//"(".$arr[1].")";
		
		
		
	return $str;
}


function getSubjectForInternalReportMCA45($db,$sem, $branch, $ref, $usn){

	$str = "";
	
	if($sem == 4){
			
			if($ref < 5 || $ref > 5){
				$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
			}
			else{
				$qr1 = $db->query(" SELECT elective 
									FROM student 
									WHERE usn = '$usn'")or die($db->error());
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT sname, scode 
									FROM subjects 
									WHERE scode = '$arr1[0]'
									AND ref = $ref")or die($db->error());
			}
	}
	else if($sem == 5){
			
			if($ref < 4 || $ref > 5){
			
				$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'")or die($db->error());
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT sname, scode 
									FROM subjects 
									WHERE (scode = '$arr1[0]' 
									OR scode = '$arr1[1]')
									AND ref = $ref")or die($db->error());
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
				$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
			}
			else{
				$qr1 = $db->query(" SELECT elective 
									FROM student 
									WHERE usn = '$usn'")or die($db->error());
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT sname, scode 
									FROM subjects 
									WHERE scode = '$arr1[0]'
									AND ref = $ref")or die($db->error());
			}
	}
	else if($sem == 7){
			
			if($ref < 5 || $ref > 6){
			
				$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'")or die($db->error());
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT sname, scode 
									FROM subjects 
									WHERE (scode = '$arr1[0]' 
									OR scode = '$arr1[1]')
									AND ref = $ref")or die($db->error());
			}
	}	
	else if($sem == 8){
			
			if($ref < 3 || $ref > 4){
			
				$qr = $db->query(" SELECT sname, scode 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							AND ref = $ref")or die($db->error());
		
			}
			else{
			
				$qr1 = $db->query(" SELECT elective, elective2 
									FROM student 
									WHERE usn = '$usn'")or die($db->error());
				$arr1 = $qr1->fetch_row();
				
				$qr = $db->query(" SELECT sname, scode 
									FROM subjects 
									WHERE (scode = '$arr1[0]' 
									OR scode = '$arr1[1]')
									AND ref = $ref")or die($db->error());
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
	$q =$db->query("DELETE FROM elective_status")or die($db->error());

	if(($branch == 'BA' || $sem > 2) && ($branch != 'MBA') && ($branch != 'MCA')){
	
		$qr = $db->query(" SELECT scode,sname,elective,ref , cycle
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' AND cycle='$sec' 
							 order by `ref` ")or die($db->error());

		while($name=$qr->fetch_assoc()){
			if($name['elective']==1){
				$ele_c++;
				$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['scode']).")--- ".$name['sname']."</span> (Elective)<br />";
				$q="INSERT INTO elective_status VALUES(".$name['ref'].", '".strtoupper($name['scode'])."' , $ele_c )";
				$res1=$db->query($q)or die($db->error());
			}
			else{
				//AE
				if($branch == 'AE' || $branch == 'AU'){
					$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";	
				}
				else{
					if($sec != '-'){//Second shift A and B Issue solved
					   if(($name['scode'][strlen($name['scode'])-1] == 'A') && $name['cycle']=='A2')
					   		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";	
					   else if($name['scode'][strlen($name['scode'])-1] != 'B' && $name['scode'][strlen($name['scode'])-1] != 'A')
							$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
					}
					else if($sec == '-'){
					   if(($name['scode'][strlen($name['scode'])-1] == 'B') && $name['cycle']=='-')
					   		$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";	
					   else if($name['scode'][strlen($name['scode'])-1] != 'B' && $name['scode'][strlen($name['scode'])-1] != 'A')
							$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
					}
					//	$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
				}
			}
		}
		
		return $subject_str;
	
	}
	else if(($sem < 3) && ($branch != 'MBA') && ($branch != 'MCA')){
		
		$subject_str='';
			$qr = $db->query("SELECT * 
								FROM 1yr_subjects 
								WHERE sem = $sem 
								AND cycle='$cycle' order by ref");	
		while($name=$qr->fetch_assoc()){
		
		$subject_str.= "(".$name['ref'].") --- (".$name['code'].") --- ".$name['name']."<br />";
		
		}
		return $subject_str;
		
	}
	else if($branch == 'MCA'){
		
		$q =$db->query("DELETE 
						FROM elective_status")or die($db->error());
		$qr = $db->query("SELECT scode,sname,elective,ref 
							FROM subjects 
							WHERE sem = $sem 
							AND branch = '$branch' 
							order by ref ")or die($db->error());	
		while($name=$qr->fetch_assoc()){
			if($name['elective']==1){	
				$ele_c++;
				$subject_str.="<span style='color:#FF0000'>(".$name['ref'].")->".$ele_c.") --- (".strtoupper($name['scode']).") --- ".$name['sname']."</span> (Elective) <br />";
				$q="INSERT INTO elective_status VALUES(".$name['ref'].",'".strtoupper($name['scode'])."', $ele_c )";
				$res1=$db->query($q)or die($db->error());
			}
			else{
				$subject_str.= "(".$name['ref'].") --- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
			}
		}
		return $subject_str;
	
	}
	else if($branch == 'MBA'){
	
		$subject_str='';
		$qr = $db->query("SELECT * FROM subjects WHERE sem = $sem AND branch = '$branch' order by ref")or die($db->error());	
		while($name=$qr->fetch_assoc()){
				if($name['elective'] !=1 ){
					$subject_str.= "(".$name['ref'].") ---- (".strtoupper($name['scode']).") --- ".$name['sname']."<br />";
				}
		}
		if($sem > 2 && $branch == 'MBA'){
				$qr = $db->query("SELECT * FROM mba_elective ")or die($db->error());	
				while($name=$qr->fetch_assoc()){
					$subject_str.= $name['code']."-".$name['name']."<strong>;</strong>  ";
			}
		}
		return $subject_str;	
	}
}

function getTypeSubject($db,$sc){
	$t = "T";
	$q_c = $db->query("SELECT type FROM `1yr_subjects` WHERE `code` = '$sc' and type='L'")or die($db->error());
		$subject = $q_c->num_rows();
		if($subject != 0){
			$t = 'L';
		}
		else{
			$q_c = $db->query("SELECT type FROM `subjects` WHERE `scode` = '$sc' and type='L'")or die($db->error());		
			$subject = $q_c->num_rows();
			if($subject != 0){
				$t = "L";
			}
		}
	return $t;	
}

function GetBranch($db,$c){ 
	$q = $db->query("SELECT name FROM branches WHERE code = '$c'")or die($db->error());
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
	$q = $db->query("SELECT sname FROM subjects WHERE scode = '$c'")or die($db->error());
	$count = $q->num_rows();
		
		if($count)
		{
		$r = $q->fetch_row();
		}
		else
		{
			//echo $c;
			$q = $db->query("SELECT name FROM 1yr_subjects WHERE code = '$c'")or die($db->error());
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
						$result=$db->query($qr1)or die($db->error());
					$qr1="DELETE FROM first_internal WHERE `usn`='$code'";
						$result=$db->query($qr1)or die($db->error());
					$qr1="DELETE FROM second_internal WHERE `usn`='$code'";
						$result=$db->query($qr1)or die($db->error());
						$qr1="DELETE FROM third_internal WHERE `usn`='$code'";
						$result=$db->query($qr1)or die($db->error());
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
			$r=$db->query($query)or die($db->error());
			
			$q=$db->query("SELECT * FROM subject_entry WHERE fid = '$f'")or die($db->error());
			
			if($r=$q->num_rows()){
				$query="DELETE FROM subject_entry
						WHERE fid = '$f'";
				$r=$db->query($query)or die($db->error());
			}
		}
		if($count == $i)
					redirect('admin_remove_fac.php?msg=27&e=0');
				else
					redirect('admin_remove_fac.php?msg=6&e=1');
}

function getFacName($db,$fid){
	$qr = "SELECT name FROM log_f WHERE fid='".$fid."'";
	$qry1 = $db->query($qr)or die($db->error());
	$r = $qry1->fetch_row();
	return $r[0];
}

function getStudentName($db,$u){
	$qr = "SELECT name FROM student WHERE usn='".$u."'";
	$qry1 = $db->query($qr)or die($db->error());
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
								$HTMLlist .="<option value='".$arr['scode']."'>(".$arr['scode'].")".$arr['sname']."</option>";
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
							 $qr = "SELECT * FROM 1yr_subjects WHERE branch='".$s."' and sem=$sm and type='$type'";
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

function firstYearProgramPC($db){
	$str = array('P', 'C');
	$HTMLlist="";
	foreach($str as $s){
		$HTMLlist .='<optgroup label="'.getCycle($db,$s).'">';
		$sem = array(1,2);
		foreach($sem as $sm){
			$HTMLlist .='<optgroup label="'.$sm.' sem">';
			$qr = "SELECT * FROM 1yr_subjects WHERE branch='".$s."' AND sem=$sm AND type='$type'";
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
