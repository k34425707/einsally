<?php
    $host = '104.199.234.203';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'glass-ally-375505:asia-east1:einsally-db';
    $link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

    if($link){
    mysqli_query($link,'SET NAMES utf8');
     //echo "正確連接資料庫";
    }
    else {
        echo "不正確連接資料庫</br>" . mysqli_connect_error();
    }

    $datas="";
    $test="SELECT * FROM preorder_list WHERE purchaser = '".$_GET['name']."'";
    $result = mysqli_query($link,$test);
    if ($result) {
    // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    if (mysqli_num_rows($result)>0) {
        
        // 取得大於0代表有資料
        // while迴圈會根據資料數量，決定跑的次數
        // mysqli_fetch_assoc方法可取得一筆值
        while ($row = mysqli_fetch_array($result)) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
           $datas=$datas."<tr><td style='text-align: center;'>".$row['quantity']."</td><td style='text-align: center; width:3cm;'>".$row['price']."</td><td style='text-align: center; width:20cm;'>".$row['item_name']."</td></tr>";
        }
        echo $datas;
    }
    // 釋放資料庫查到的記憶體
    mysqli_free_result($result);

    }
    
?>