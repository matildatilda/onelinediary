<?php
    /*
    メソッド：GET
    パラメータ：
    戻り値：
        tagsテーブルの列
    戻り値の型：JSON
    */
    
    require_once "connectDb.php";

    $sql = "SELECT * FROM tags ORDER BY tag_id";        

    $result = $mysqli->query($sql);
    if (!$result) {
        die("Query failed. (" .mysql_error(). ")\n");
    }

    $data = array();
    while ($row = $result->fetch_row())
    {
        $data[] = array(
            'tag_id'=>$row[0],
            'tag'=>$row[1]
        );
    }    
    
    header('Content-type: application/json');
    echo json_encode($data);

    $result->close();
    $mysqli->close();