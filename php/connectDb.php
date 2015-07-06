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
