<?php

$sql="SELECT *,date_format(`time`,'%e %M %h:%i %p') AS _time from `notice`";

$feeds=$db->query($sql);

    if (!$feeds) {
        die('There was an error running the query ['.$db->error.']');
    }


?>
