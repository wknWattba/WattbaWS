function setup() {
    $("div.login #iamabutton").click(login);
}

function login() {
    username = $("div.login #username").val();
    password = $("div.login #password").val();
    $.post("../controller/siteadmin_login.php", {
        username: username,
        password: password
    }, function(returnValue) {
        if (returnValue.toLowerCase().includes("success")) {
            window.location.replace("../controller/home.php");
        } else {
            alert(returnValue);
        }
    });
}

$(document).ready(setup);