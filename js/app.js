window.addEventListener('load', function() {
    let btn_leftpanel = document.querySelector(".btn-leftpanel");
    let btn_leftpanel_mobile = document.querySelector(".btn-leftpanel-mobile");
    let leftpanel = document.querySelector(".leftpanel");
    let leftpanel_mobile = document.querySelector(".leftpanel-mobile");

    btn_leftpanel.onclick = function() {
        leftpanel.style.display = "none";
        leftpanel_mobile.style.display = "flex";
        leftpanel_mobile.classList.toggle("active");
    }

    btn_leftpanel_mobile.onclick = function() {
        leftpanel_mobile.style.display = "none";
        leftpanel.style.display = "flex";
        leftpanel_mobile.classList.toggle("active");
    }
})