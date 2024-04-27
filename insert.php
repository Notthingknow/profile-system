<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['form_id'])) {
        header("Location: insert.html");
    } else {
        session_start();
        $form_id = $_POST['form_id'];

        switch ($form_id) {
            case 'insert_education':
                $stmt = $conn->prepare("INSERT INTO education (education_name, NID, education_department, education_school) VALUES (?, ?, ?, ?)");
                $education_name = $_POST['education_name'];
                $nid = $_SESSION['NID'];
                $education_department = $_POST['education_department'];
                $education_school = $_POST['education_school'];
                $stmt->bind_param("ssss", $education_name, $nid, $education_department, $education_school);
                break;
            case 'insert_speciality':
                $stmt = $conn->prepare("INSERT INTO speciality (speciality_name, NID, english_name) VALUES (?, ?, ?)");
                $speciality_name = $_POST['speciality_name'];
                $nid = $_SESSION['NID'];
                $english_name = $_POST['english_name'];
                $stmt->bind_param("sss", $speciality_name, $nid, $english_name);
                break;
            case 'insert_inschool':
                $stmt = $conn->prepare("INSERT INTO in_school (inschool_name, NID) VALUES (?, ?)");
                $inschool_name = $_POST['inschool_name'];
                $nid = $_SESSION['NID'];
                $stmt->bind_param("ss", $inschool_name, $nid);
                break;
            case 'insert_outschool':
                $stmt = $conn->prepare("INSERT INTO out_school (outschool_name, NID) VALUES (?, ?)");
                $outschool_name = $_POST['outschool_name'];
                $nid = $_SESSION['NID'];
                $stmt->bind_param("ss", $outschool_name, $nid);
                break;
            case 'insert_talk':
                $stmt = $conn->prepare("INSERT INTO talk (talk_name, NID, talk_time, talk_location) VALUES (?, ?, ?, ?)");
                $talk_name = $_POST['talk_name'];
                $nid = $_SESSION['NID'];
                $talk_time = $_POST['talk_time'];
                $talk_location = $_POST['talk_location'];
                $stmt->bind_param("ssss", $talk_name, $nid, $talk_time, $talk_location);
                break;
            case 'insert_award':
                $stmt = $conn->prepare("INSERT INTO award (award_name, NID, award_time, award_institution) VALUES (?, ?, ?, ?)");
                $award_name = $_POST['award_name'];
                $nid = $_SESSION['NID'];
                $award_time = $_POST['award_time'];
                $award_institution = $_POST['award_institution'];
                $stmt->bind_param("ssss", $award_name, $nid, $award_time, $award_institution);
                break;
            case 'insert_plan':
                $stmt = $conn->prepare("INSERT INTO plan (plan_name, NID, plan_time, plan_job) VALUES (?, ?, ?, ?)");
                $plan_name = $_POST['plan_name'];
                $nid = $_SESSION['NID'];
                $plan_time = $_POST['plan_time'];
                $plan_job = $_POST['plan_job'];
                $stmt->bind_param("ssss", $plan_name, $nid, $plan_time, $plan_job);
                break;
            case 'insert_paper':
                $stmt = $conn->prepare("INSERT INTO paper (paper_name, NID, paper_author, paper_periodical, paper_time) VALUES (?, ?, ?, ?, ?)");
                $paper_name = $_POST['paper_name'];
                $nid = $_SESSION['NID'];
                $paper_time = $_POST['paper_time'];
                $paper_author = $_POST['paper_author'];
                $paper_periodical = $_POST['paper_periodical'];
                $stmt->bind_param("sssss", $paper_name, $nid, $paper_author, $paper_periodical, $paper_time);
                break;
            case 'insert_course':
                $stmt = $conn->prepare("INSERT INTO course (course_name, NID, course_room, course_class, course_time, course_week) VALUES (?, ?, ?, ?, ?, ?)");
                $course_name = $_POST['course_name'];
                $nid = $_SESSION['NID'];
                $course_room = $_POST['course_room'];
                $course_class = $_POST['course_class'];
                $course_time = $_POST['course_time'];
                $course_week = $_POST['course_week'];
                $stmt->bind_param("ssssii", $course_name, $nid, $course_room, $course_class, $course_time, $course_week);
                break;
            case 'insert_student':
                $stmt = $conn->prepare("INSERT INTO student (student_name, NID, student_award, student_institution, student_time) VALUES (?, ?, ?, ?, ?)");
                $student_name = $_POST['student_name'];
                $nid = $_SESSION['NID'];
                $student_award = $_POST['student_award'];
                $student_institution = $_POST['student_institution'];
                $student_time = $_POST['student_time'];
                $stmt->bind_param("sssss", $student_name, $nid, $student_award, $student_institution, $student_time);
                break;

            default:
                // 未知的表单标识
                echo "未知的表单标识";
                break;
        }
        $stmt->execute();
        $stmt->close();
        header("Location: insert.html");
        exit();
    }
}
?>