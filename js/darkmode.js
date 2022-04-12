    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
window.addEventListener('load', function() {
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
})