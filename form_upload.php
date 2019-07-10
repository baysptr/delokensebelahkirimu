<?php

include "config.php";
$token = $_POST['token'];
$gen_name = uniqid('MY_INIT_');

$imageName = $gen_name . '.' . pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION);
move_uploaded_file($_FILES["gambar"]["tmp_name"],'ini_logs/' . $imageName);
$sql = mysqli_query($conn, "update tokens set init_log = '$gen_name' where token = '$token'");

echo "SUCCESS: " . $token;
