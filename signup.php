<?php
require_once 'connection.php';
session_start();
$_SESSION['NID'] = $_POST['NID'];

$stmt = $conn->prepare("INSERT INTO users (NID, password) VALUES (?, ?)");
$nid = $_POST['NID'];
$stmt->bind_param("ss", $nid, $_POST['password']);
$stmt->execute();

$namePrefix = 'Miku';
$nameSuffix = 1;

$name = $namePrefix . $nameSuffix;

while (true) {
    try {
        $stmt = $conn->prepare("INSERT INTO person (person_name, NID, person_position, person_photo, person_email, person_phone) VALUES (?, ?, 'Idol', 'miku@gmail.com', '123', './miku.jpg')");
        $stmt->bind_param("ss", $name, $nid);
        $stmt->execute();
        $stmt->close();

        break;
    } catch (Exception $e) {
        $nameSuffix++;
        $name = $namePrefix . $nameSuffix;
    }
}

header('Location: insert.html');
?>