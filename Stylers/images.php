<?php
  $bg = array('01.jpg', '02.jpg', '03.jpg', '04.jpg', ); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>