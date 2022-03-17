window.onload = function() {
    var checkbtn = document.querySelector(".checkbox-btn");
    checkbtn.onclick = function() {
        if(checkbtn.checked == true) {
            var theme = "dark";
        } else {
            var theme = "light";
        }
        document.cookie = "theme=" + theme;
        window.location.reload();
    }
}