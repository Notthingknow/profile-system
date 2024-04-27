<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = ['education', 'speciality', 'in_school', 'out_school', 'talk', 'award', 'plan', 'paper', 'course', 'student', 'person', 'users'];
    session_start();

    foreach ($name as $value) {
        $sql = "DELETE FROM $value WHERE NID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['NID']);
        $stmt->execute();
    }
    header("Location: index.html");
} else {
    $table = $_GET['table'];
    $name = $_GET['name'];
    $sql = "DELETE FROM " . $table . " WHERE " . $table . "_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
}


mysqli_close($conn);
?>