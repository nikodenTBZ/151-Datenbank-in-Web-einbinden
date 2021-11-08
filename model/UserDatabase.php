<?php

function user_db_connect()
{
    $db_host = '34.65.96.61';
    $db_name = 'm151_nikolai';
    $db_user = 'root';
    $db_pass = 'root';


    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}

?>
