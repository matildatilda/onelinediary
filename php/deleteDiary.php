<?php
    /*
    メソッド：POST
    パラメータ：
        diary_id (整数型)　1以上を期待
    */
    
    require_once "connectDb.php";

    $sql = "DELETE FROM diaries WHERE diary_id = ".$_POST["diary_id"];
    //echo $sql;

    if ($mysqli->query($sql) !== true) {
        die("Query failed. (" .mysql_error(). ")\n");
    }

    $mysqli->close();
