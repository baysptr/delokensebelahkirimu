<?php
    include "config.php";

    $token = $_POST['token'];

    $exec = mysqli_query($conn, "select * from tokens where token = '$token'");
    $row = mysqli_num_rows($exec);

    echo $row;