<?php
    include "config.php";
    $id = $_GET['id'];
    $exec = mysqli_query($conn, "delete from tokens where id = '$id'");
    echo "<script>alert('Success');window.location='monitoring.php';</script>";
