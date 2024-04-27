<?php
require_once 'connection.php';
session_start();


$name = $_GET['name'];

switch ($name) {
    case 'NID':
        $sql = "SELECT NID FROM users ORDER BY NID DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $data = array(
                'nid' => $row["NID"] + 1
            );

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;
    case 'person':
        $sql = "SELECT * FROM person WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'person_name' => $row["person_name"],
                    'person_position' => $row["person_position"],
                    'person_email' => $row["person_email"],
                    'person_phone' => $row["person_phone"],
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
        break;
    case 'education':
        $sql = "SELECT * FROM education WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'education_name' => $row["education_name"],
                    'education_department' => $row["education_department"],
                    'education_school' => $row["education_school"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;
    case 'speciality':
        $sql = "SELECT * FROM speciality WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'speciality_name' => $row["speciality_name"],
                    'english_name' => $row["english_name"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;
    case 'inschool':
        $sql = "SELECT * FROM in_school WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'inschool_name' => $row["inschool_name"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;
    case 'outschool':
        $sql = "SELECT * FROM out_school WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'outschool_name' => $row["outschool_name"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;
    case 'talk':
        $sql = "SELECT * FROM talk WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'talk_name' => $row["talk_name"],
                    'talk_time' => $row["talk_time"],
                    'talk_location' => $row["talk_location"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

    case 'award':
        $sql = "SELECT * FROM award WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'award_name' => $row["award_name"],
                    'award_institution' => $row["award_institution"],
                    'award_time' => $row["award_time"]
                );
            }
            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

    case 'plan':
        $sql = "SELECT * FROM plan WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'plan_name' => $row["plan_name"],
                    'plan_time' => $row["plan_time"],
                    'plan_job' => $row["plan_job"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

    case 'paper':
        $sql = "SELECT * FROM paper WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'paper_name' => $row["paper_name"],
                    'paper_author' => $row["paper_author"],
                    'paper_periodical' => $row["paper_periodical"],
                    'paper_time' => $row["paper_time"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

    case 'course':
        $sql = "SELECT * FROM course WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'course_name' => $row["course_name"],
                    'course_room' => $row["course_room"],
                    'course_time' => $row["course_time"],
                    'course_class' => $row["course_class"],
                    'course_week' => $row["course_week"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

    case 'student':
        $sql = "SELECT * FROM student WHERE NID = " . $_SESSION['NID'];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    'student_name' => $row["student_name"],
                    'student_award' => $row["student_award"],
                    'student_institution' => $row["student_institution"],
                    'student_time' => $row["student_time"]
                );
            }

            $json_data = json_encode($data);

            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "沒有找到資料";
        }
        break;

}

mysqli_close($conn);
?>