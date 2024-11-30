function runPHP() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            window.location.href = "login.php";
        }
    };
    xhr.send();
}
