<?php
     /*
    メソッド：POST
    パラメータ：
        year (整数型)　西暦（４桁）を期待
        month (整数型)　月を期待
        day （整数型）日を期待
        diary (文字列)　空白以外を期待
    */
    
    require_once "connectDb.php";

    $sql = "INSERT INTO diaries (year, month, day, diary) VALUE (".$_POST["year"].", ".$_POST["month"].", ".$_POST["day"].", '".$_POST["diary"]."')";

    if ($mysqli->query($sql) !== true) {
        die("Query failed. (" .mysql_error(). ")\n");
    }

    $mysqli->close();
