<?php

$sql=" SELECT * FROM notice ORDER BY time DESC";

$feeds=$db->query($sql);

    if (!$feeds) {
        die('There was an error running the query ['.$db->error.']');
    }


?>
