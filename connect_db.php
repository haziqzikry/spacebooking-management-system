<?php

    include_once "connect_sql.php";

    $selected = mysqli_select_db($con, "id19145797_spacedb");

    if(!$selected){
        echo('ERROR: Could not connect.<br>');
    }

?>