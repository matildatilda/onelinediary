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
    
    $sql = "SELECT * FROM diaries";

    $result = $mysqli->query($sql);
    if (!$result) {
        die("Query failed. (" .mysql_error(). ")\n");
    }
    
    /*
    printf("{");
    while ($row = $result->fetch_row()) {
        printf("{");
        printf (" year: %d,", $row[1]);
        printf(" month: %d,", $row[2]);
        printf(" day: %d,", $row[3]);
        printf(" diary: %s,",$row[4]);
        printf(" }");
    }
    printf(" }");
    */
    printf("<tr><th>日</th><th>日記</th><th>変更</th><th>削除</th></tr>");

    while ($row = $result->fetch_row())
    {
        printf("<tr><th>".$row[3]."</td><td>".$row[4]."</td><td></td><td></td><tr>");    
    }    
    $result->close();
    $mysqli->close();
    