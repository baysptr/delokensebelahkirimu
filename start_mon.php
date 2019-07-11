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
$dir = $_POST['dir'];
$tgl = date('Y-m-d H:i:s');

$exec = mysqli_query($conn, "select * from tokens where token = '$token'");
$parse_data = mysqli_fetch_assoc($exec);
$id_token = $parse_data['id_telegram'];
$pesan = "Anda telah terhubung ke: <b>".$dir."</b>
Date: <i>".$tgl."</i>
File Log: http://localhost/bagus/first_log.php?db=".$parse_data['init_log'].".db";

do_telegram($id_token, $pesan);