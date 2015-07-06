<?php
    /*
    メソッド：GET
    パラメータ：
        year (整数型)　西暦（４桁）を期待
        month (整数型)　月を期待
        diary_id (整数型)　1以上を期待
    戻り値：
        diariesテーブルの列
    戻り値の型：JSON
    */
    
    require_once "connectDb.php";

    if (isset($_GET["diary_id"]))
    {
        $sql = "SELECT * FROM diaries WHERE diary_id = ".$_GET["diary_id"];        
    }
    else
    {
        $sql = "SELECT * FROM diaries WHERE year = ".$_GET["year"]." AND month = ".$_GET["month"];
    }
    
    $result = $mysqli->query($sql);
    if (!$result) {
        die("Query failed. (" .mysql_error(). ")\n");
    }

    $data = array();
    while ($row = $result->fetch_row())
    {
        $data[] = array(
            'diary_id'=>$row[0],
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
    