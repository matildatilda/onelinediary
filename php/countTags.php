<?php
    /*
    メソッド：GET
    パラメータ：
        year (整数型)　西暦(4桁)を期待
        month (整数型)　月を期待
    戻り値：
    [
        tag (文字列)　タグ名
        numOfDiaries （整数型）タグを含むdiaryの数
    ]
    戻り値の型：JSON
    */
    
    require_once "connectDb.php";

    $data = array();

    $sql = "SELECT * FROM tags ORDER BY tag_id";        

    $result = $mysqli->query($sql);
    if ($result)
    {
        while ($row = $result->fetch_row())
        {
            $sql = "SELECT COUNT(*) FROM diaries WHERE diary LIKE '%#".$row[1]."%' AND year = ".$_GET["year"]." AND month = ".$_GET["month"];

            $countResult = $mysqli->query($sql);
            if ($countResult)
            {
                $countRow = $countResult->fetch_row();
                $data[] = array(
                    "tag"=>$row[1],
                    "numOfDiaries"=>$countRow[0]
                );
                $countResult->close();
            }
        }
        $result->close();
    }

    header('Content-type: application/json');
    echo json_encode($data);

    $mysqli->close();