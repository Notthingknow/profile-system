function del(table, name) {
    var url = `http://localhost/del.php?table=${encodeURIComponent(table)}&name=${encodeURIComponent(name)}`;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
    xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
    var queryString = `name=${encodeURIComponent('person')}`;
    var url = `http://localhost/find.php?${queryString}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(item => {
                document.getElementById("person_name").value = item.person_name;
                document.getElementById("person_position").value = item.person_position;
                document.getElementById("person_email").value = item.person_email;
                document.getElementById("person_phone").value = item.person_phone;
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
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.education_school + " " + item.education_department + " " + item.education_name;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('education', '${item.education_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("education_infor").appendChild(newDiv);
                            break;
                        case 'speciality':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";
                            newDiv.id = "speciality_item";

                            var newDiv2 = document.createElement("div");
                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.speciality_name;
                            newDiv2.appendChild(newParagraph);
                            var newParagraph2 = document.createElement("p");
                            newParagraph2.textContent = item.english_name;
                            newDiv2.appendChild(newParagraph2);
                            newDiv.appendChild(newDiv2);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('speciality', '${item.speciality_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("speciality_infor").appendChild(newDiv);
                            break;
                        case 'inschool':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.inschool_name;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('inschool', '${item.inschool_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("inschool_infor").appendChild(newDiv);
                            break;
                        case 'outschool':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = item.outschool_name;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('outschool', '${item.outschool_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("outschool_infor").appendChild(newDiv);
                            break;
                        case 'talk':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = "演講名稱：" + item.talk_name + "，演講時間：" + item.talk_time + "，演講地點：" + item.talk_location;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('talk', '${item.talk_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("talk_infor").appendChild(newDiv);
                            break;
                        case 'award':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = "奬項名稱：" + item.award_name + "，獲獎時間：" + item.award_time + "，頒獎機構：" + item.award_institution;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('award', '${item.award_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("award_infor").appendChild(newDiv);
                            break;
                        case 'plan':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = "計劃名稱：" + item.plan_name + "，計劃時間：" + item.plan_time + "，擔任機構：" + item.plan_job;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('award', '${item.award_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("plan_infor").appendChild(newDiv);
                            break;
                        case 'paper':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = "論文名稱：" + item.paper_name + "，發佈機構：" + item.paper_periodical + "，發佈時間：" + item.paper_time + "，論文作者：" + item.paper_author;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('award', '${item.award_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("paper_infor").appendChild(newDiv);
                            break;
                        case 'course':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            var week = ['', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'];
                            var time = ['', '第一節', '第二節', '第三節', '第四節', '第五節', '第六節', '第七節', '第八節', '第九節', '第十節', '第十一節', '第十二節', '第十三節', '第十四節'];
                            newParagraph.textContent = "課程名稱：" + item.course_name + "，課程時間：" + week[item.course_week] + " " + time[item.course_time] + "，課程地點:" + item.course_room + "，課程班級：" + item.course_class;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('award', '${item.award_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("course_infor").appendChild(newDiv);
                            break;
                        case 'student':
                            var newDiv = document.createElement("div");
                            newDiv.className = "infor_item";

                            var newParagraph = document.createElement("p");
                            newParagraph.textContent = "學生名字：" + item.student_name + "，奬項名稱：" + item.student_award + "，頒獎機構：" + item.student_institution + "，獲獎時間："
                                + item.student_time;
                            newDiv.appendChild(newParagraph);

                            var deletebtn = document.createElement("button");
                            deletebtn.type = "button";
                            deletebtn.className = "del_btn";
                            deletebtn.textContent = "刪除";
                            deletebtn.setAttribute("onclick", `del('award', '${item.award_name}')`);
                            newDiv.appendChild(deletebtn);

                            document.getElementById("student_infor").appendChild(newDiv);
                            break;
                    }
                });
            })
            .catch(error => {
                console.error('錯誤:', error);
            });
    }
});

function showPopup(id) {
    document.getElementById(id).style.display = "flex";
}

function hidePopup(id) {
    document.getElementById(id).style.display = "none";
}