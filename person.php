<?php
require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if ($fileError === UPLOAD_ERR_OK) {
            $uniqueFileName = uniqid() . '_' . $fileName;
            $targetPath = 'src/' . $uniqueFileName;
            move_uploaded_file($fileTmpName, $targetPath);

            $nid = $_SESSION['NID'];
            $stmt = $conn->prepare("UPDATE person SET person_photo = ? WHERE NID = ?");
            $stmt->bind_param("si", $targetPath, $nid);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } else {
            echo "圖片上傳失敗：" . $fileError;
        }
    }
    if ($_POST['form_id'] === 'edit_person') {
        $nid = $_SESSION['NID'];
        $stmt = $conn->prepare("UPDATE person SET person_name = ?, person_position = ?, person_email = ?, person_phone = ? WHERE NID = ?");
        $person_name = $_POST['person_name'];
        $person_position = $_POST['person_position'];
        $person_email = $_POST['person_email'];
        $person_phone = $_POST['person_phone'];
        $stmt->bind_param("sssss", $person_name, $person_position, $person_email, $person_phone, $nid);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    header("Location: insert.html");
    exit();
}
?>