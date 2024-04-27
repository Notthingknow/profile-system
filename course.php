<!DOCTYPE html>
<html>

<head>
    <title>课表</title>
    <link rel="stylesheet" href="./course.css">
</head>

<body>
    <div id="top">
        <img src="./back.png" alt="back" id="back_img" onclick="back()">
        <div>
            <p id="sign_up" onclick="sign_up_page()">注冊</p>
            <p id="login" onclick="login_page()">登入</p>
        </div>
    </div>
    <div class="container">
        <h1>课表</h1>
        <table class="qwe">
            <tr>
                <th> </th>
                <th>星期一</th>
                <th>星期二</th>
                <th>星期三</th>
                <th>星期四</th>
                <th>星期五</th>
                <th>星期六</th>
                <th>星期日</th>
            </tr>
            <?php
            require_once 'connection.php';
            session_start();

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
            }

            $time = ['第一節', '第二節', '第三節', '第四節', '第五節', '第六節', '第七節', '第八節', '第九節', '第十節', '第十一節', '第十二節', '第十三節', '第十四節'];

            for ($i = 0; $i < 14; $i++) {
                echo "<tr>";
                echo "<th>" . $time[$i] . "</th>";
                for ($j = 1; $j < 8; $j++) { {
                        echo "<td>";
                        foreach ($data as $value) {
                            if ($value['course_time'] == $i && $value['course_week'] == $j) {
                                echo $value['course_name'] . "<br>" . $value['course_room'] . $value['course_class'] . "<br>";
                            }
                        }
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }


            ?>
        </table>
    </div>
    <script>
        function back() {
            window.location.href = 'http://localhost/profile.html';
        }
        function login_page() {
            window.location.href = 'http://localhost/login.php';
        }

        function sign_up_page() {
            window.location.href = 'http://localhost/signup.html';
        }
    </script>
</body>

</html>