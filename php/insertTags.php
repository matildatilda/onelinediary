<?php
    /*
    メソッド：POST
    パラメータ：
        tags[] （文字配列）空白以外を期待
    */
    
    require_once "connectDb.php";

    foreach($_POST["tags"] as $value)
    {
        $sql = "SELECT * FROM tags WHERE tag = '".$value."'";
        $result = $mysqli->query($sql);

        if ($result)
        {
            if ($result->num_rows == 0)
            {
                $sql = "INSERT INTO tags (tag) VALUE ('".$value."')";
                $mysqli->query($sql);
            }
        }
        $result->close();
    }

    $mysqli->close();
