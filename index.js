function login_page() {
    window.location.href = 'http://localhost/login.php';
}

function sign_up_page() {
    window.location.href = 'http://localhost/signup.html';
}

document.addEventListener("DOMContentLoaded", function () {
    var url = `http://localhost/index1.php`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(item => {
                var newDiv = document.createElement("div");
                newDiv.className = "item";
                newDiv.onclick = function () {
                    fetch(`http://localhost/profile.php?NID=${encodeURIComponent(item.NID)}`);
                    window.location.href = `http://localhost/profile.html`;
                };

                var newImg = document.createElement("img");
                newImg.src = item.person_photo;
                newDiv.appendChild(newImg);

                var newDiv2 = document.createElement("div");
                newDiv2.className = "flex_box";

                var newh3 = document.createElement("h3");
                newh3.textContent = item.person_name;
                newDiv2.appendChild(newh3);

                newDiv.appendChild(newDiv2);

                document.getElementById("box").appendChild(newDiv);
            })
        })
        .catch(error => {
            console.error('錯誤:', error);
        });
});