    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
window.addEventListener('load', function() {
    var close = document.getElementsByClassName('closebtn');
    var i;
    for(i=0; i<close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity='0';
            setTimeout(
                function() {
                    div.style.display="none";
                }, 600
            );
        }
    }
})