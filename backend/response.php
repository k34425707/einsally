<?php

    //資料庫變數
    $db_type = 'mysql';//使用那一種資料庫
    $db_host = '10.99.128.4';//主機位置
    $db_name = 'einsally';//資料庫名稱
    $db_user = 'root';//使用者
    $db_password= '';//密碼
    // 資料庫連線
    try {
        $pdo = new PDO($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
        $sql = 'SELECT * FROM preorder_list WHERE purchaser = :purchaser';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':purchaser', $_GET['name']);
        $stmt->execute();
        $datalist = $stmt->fetchAll();
        $datas="";
        foreach ($datalist as $row) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
           $datas=$datas."<tr><td style='text-align: center;'>".$row['quantity']."</td><td style='text-align: center; width:3cm;'>".$row['price']."</td><td style='text-align: center; width:20cm;'>".$row['item_name']."</td></tr>";
        }
        echo $datas;
    } catch (PDOException $e) {
        echo "error  ".$e;
    }
?>