<?php
    date_default_timezone_set("Asia/Jakarta");
    include "config.php";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

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

    $id_tele = $_POST['id_tele'];
    $label = $_POST['label'];
    $token = generateRandomString();
    $tgl = date("Y-m-d H:i:s");
    $pesan = "Label: <b>".$label."</b>
Token: <b>".$token."</b>
Generate date: ".$tgl;

    $exec = mysqli_query($conn, "insert into tokens (id_telegram, label, token, tgl_update) values ('$id_tele', '$label', '$token', '$tgl')");
    if($exec){
        echo "<script>alert('Success');window.location='monitoring.php';</script>";
        do_telegram($id_tele, $pesan);
    }else{
        echo "<script>alert('Failed');window.location='create_token.php';</script>";
    }