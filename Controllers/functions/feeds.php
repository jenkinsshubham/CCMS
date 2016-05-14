<?php

$sql=" SELECT * FROM notice";

$feeds=$db->query($sql);

    if (!$feeds) {
        die('There was an error running the query ['.$db->error.']');
    }


?>
