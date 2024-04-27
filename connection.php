<?php
$mydbhost = "localhost";
$mydbuser = "root";
$mydbpass = '';
$dbname = "test";

$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass, $dbname);
if (!$conn) {
    die("連接失敗：" . mysqli_error($conn));
}
?>