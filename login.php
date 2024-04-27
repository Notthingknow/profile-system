<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT NID, password FROM users WHERE NID = ? AND password = ?");
    $stmt->bind_param("ss", $_POST['NID'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['NID'] = $_POST['NID'];
        header("Location: insert.html");
        exit();
    } else {
        echo "<script>alert('Wrong NID or password!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="top">
        <img src="./back.png" alt="back" id="back_img" onclick="back()">
    </div>

    <div id="box">
        <form id="login" method="post">
            <label id="NID">NID:</label>
            <input type="text" name="NID">
            <br>
            <label>Password:</label>
            <input type="password" name="password">
            <br>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        function back() {
            window.location.href = "http://localhost/index.html";
        }
    </script>
</body>

</html>