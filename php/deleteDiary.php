<?php

    header("Content-Type: text/html; charset=UTF-8");

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "onelinediary";
    $dbport = 3306;
    
    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
    
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error."\n");
    }

    $sql = "DELETE FROM diaries WHERE diary_id = ".$_POST["diary_id"];
    //echo $sql;

    if ($mysqli->query($sql) !== true) {
        die("Query failed. (" .mysql_error(). ")\n");
    }
    $mysqli->close();
