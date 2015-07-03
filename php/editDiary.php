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
    
    $sql = "SELECT * FROM diaries WHERE diary_id = ".$_GET["diary_id"];

    $result = $mysqli->query($sql);
    if ($result)
    {
        $row = $result->fetch_row();
        $data = array(
            'year'=>$row[1],
            'month'=>$row[2],
            'day'=>$row[3],
            'diary'=>$row[4]
        );
    }    
    header('Content-type: application/json');
    echo json_encode($data);

    $result->close();
    $mysqli->close();