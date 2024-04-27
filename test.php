<?php
require_once 'connection.php';

$name = ['education', 'speciality', 'in_school', 'out_school', 'talk', 'award', 'plan', 'paper', 'course', 'student', 'person', 'users'];
session_start();
$_SESSION['NID'] = '1083263';

foreach ($name as $value) {
    $sql = "DELETE FROM $value WHERE NID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['NID']);
    $stmt->execute();
}


mysqli_close($conn);
?>