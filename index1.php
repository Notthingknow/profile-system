<?php
require_once 'connection.php';

$sql = "SELECT person_name, person_photo, NID FROM person";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'person_name' => $row["person_name"],
            'person_photo' => $row["person_photo"],
            'NID' => $row["NID"]
        );
    }

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
} else {
    echo "沒有找到資料";
}

mysqli_close($conn);
?>