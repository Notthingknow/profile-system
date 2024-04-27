function login_page() {
    window.location.href = 'http://localhost/login.php';
}

function sign_up_page() {
    window.location.href = 'http://localhost/signup.html';
}

function back() {
    window.location.href = 'http://localhost/index.html';
}

function course() {
    window.location.href = 'http://localhost/course.php';
}

document.addEventListener("DOMContentLoaded", function () {
    var queryString = `name=${encodeURIComponent('person')}`;
    var url = `http://localhost/find.php?${queryString}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(item => {
                document.getElementById("name").innerHTML = item.person_name;
                document.getElementById("position").innerHTML = item.person_position;
                document.getElementById("email").innerHTML = item.person_email;
                document.getElementById("phone").innerHTML = item.person_phone;
                document.getElementById("img").src = item.person_photo;
            })
        })
        .catch(error => {
            console.error('錯誤:', error);
        })

    const name = ['education', 'speciality', 'inschool', 'outschool', 'talk', 'award', 'plan', 'paper', 'course', 'student'];
    for (let i = 0; i < 10; i++) {
        queryString = `name=${encodeURIComponent(name[i])}`;
        url = `http://localhost/find.php?${queryString}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                data.forEach(item => {
                    switch (name[i]) {
                        case 'education':
                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.education_school + " " + item.education_department + " " + item.education_name;
                            document.getElementById("edu").appendChild(newParagraph);
                            break;
                        case 'speciality':
                            var div = document.getElementById("spe");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.speciality_name;
                            div.appendChild(newParagraph);

                            var newParagraph2 = document.createElement("p");
                            newParagraph2.textContent = item.english_name;
                            div.appendChild(newParagraph2);

                            div.appendChild(document.createElement("br"));
                            break;
                        case 'inschool':
                            var div = document.getElementById("in");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.inschool_name;
                            div.appendChild(newParagraph);
                            break;
                        case 'outschool':
                            var div = document.getElementById("out");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.outschool_name;
                            div.appendChild(newParagraph);
                            break;
                        case 'talk':
                            var div = document.getElementById("talk");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.talk_name + "，" + item.talk_time + "，" + item.talk_location;
                            div.appendChild(newParagraph);
                            break;
                        case 'award':
                            var div = document.getElementById("award");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.award_name + "，" + item.award_time + "，" + item.award_insititution;
                            div.appendChild(newParagraph);
                            break;
                        case 'plan':
                            var div = document.getElementById("plan");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.plan_name + "，" + item.plan_time + "，" + item.plan_job;
                            div.appendChild(newParagraph);
                            break;
                        case 'paper':
                            var div = document.getElementById("paper");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.paper_name + "，" + item.paper_author + "，" + item.periodical + " " + item.paper_time;
                            div.appendChild(newParagraph);
                            break;
                        case 'course':
                            var div = document.getElementById("course");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.course_name + "，" + item.course_time + "，" + item.course_location;
                            div.appendChild(newParagraph);
                            break;
                        case 'student':
                            var div = document.getElementById("stu");

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.student_award + "，" + item.student_institution + "，" + item.student_time;
                            div.appendChild(newParagraph);
                            break;
                    }
                });
            })
            .catch(error => {
                console.error('錯誤:', error);
            });
    }
});