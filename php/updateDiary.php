<?php
    /*
    メソッド：POST
    パラメータ：
        diary_id (整数型)　1以上を期待
        diary (文字列)　空白以外を期待
    */

    require_once "connectDb.php";

    $sql = "UPDATE diaries SET diary = '".$_POST["diary"]."' WHERE diary_id = ".$_POST["diary_id"];

    if ($mysqli->query($sql) !== true) {
        die("Query failed. (" .mysql_error(). ")\n");
    }

    $mysqli->close();
