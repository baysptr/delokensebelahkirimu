<?php
    date_default_timezone_set("Asia/Jakarta");
    include "config.php";

function do_telegram($id, $pesan){
    $url = "https://api.telegram.org/bot858754598:AAH6yoiHz_vBsiEJSdN0Wge1bjEY9s8MziY/sendMessage?parse_mode=html&chat_id=".$id;
    $url = $url . "&text=".urlencode($pesan);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}



    $token = $_POST['token'];
    $mode = $_POST['mode'];
    $mon = $_POST['mon'];
    $enk = $_POST['enk'];
    $tgl = date("Y-m-d H:i:s");

    $exec = mysqli_query($conn, "select * from tokens where token = '$token'");
    $parse_data = mysqli_fetch_assoc($exec);
    $id_token = $parse_data['id'];

    $query = mysqli_query($conn, "insert into monitoring (id_token, mode, moni, enk, tgl) values ('$id_token', '$mode', '$mon', '$enk', '$tgl')");
    if($query){
        echo "SUCCESS";
        $pesan = "Mode: <b>".$mode."</b>
File: <b>".$mon."</b>
Encrypt: <b>".$enk."</b>
Date: <b>".$tgl."</b>";

        do_telegram($parse_data['id_telegram'], $pesan);
    }else{
        echo "FAILED<br/>";
        echo mysqli_error($conn);
    }
