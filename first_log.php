<?php
$dbs = $_GET['db'];
if(!isset($dbs) || $dbs == ""){
    echo "<script>alert('Sorry bukan hak anda ini!');window.location='index.php';</script>";
}

class MyDB extends SQLite3 {

    function __construct($sss) {
        $this->open('ini_logs/'.$sss);
    }
}

$db = new MyDB($dbs);
if(!$db) {
    echo "<script>alert('Sorry bukan hak anda ini!');window.location='index.php';console.log(".$db->lastErrorMsg().")</script>";
    echo "DB anda tidak kami ketahui<br/>";
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
      SELECT * from first_log;
EOF;

$ret = $db->query($sql);
echo "<center><table border='1'><tr><td><strong>ID</strong></td><td><strong>Directory</strong></td><td><strong>Encrypt</strong></td><td><strong>Date</strong></td></tr>";
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo "<tr><td>".$row['id']."</td><td>".$row['dir']."</td><td>".$row['enk']."</td><td>".$row['tgl']."</td></tr>";
}
echo "</table></center>";
echo "Operation done successfully\n";
$db->close();
?>
