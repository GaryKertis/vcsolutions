var vcApp = function(){
    var bg;
    var interval;
    var opacity = 0;
    window.onload = function() {
        bg = document.getElementById("vc-bg");
    }

    return {
        showBg: showBg,
        hideBg: hideBg
    }

    function showBg() {
        clearInterval(interval);
        interval = setInterval(function() {
            if (opacity < 1) {
                bg.style.opacity = opacity;
                opacity += 0.1;
            } else {
                clearInterval(interval);
            }
        }, 10)
    }

    function hideBg() {
        clearInterval(interval);
        interval = setInterval(function() {
            if (opacity > 0) {
                bg.style.opacity = opacity;
                opacity -= 0.1;
            } else {
                clearInterval(interval);
            }
        }, 10)
    }
}()
