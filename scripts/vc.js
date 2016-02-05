var vcApp = function() {

    var bg;
    var userScrolled = false;

    if (window.attachEvent) {
        window.attachEvent('onload', startVc);
    } else if (window.addEventListener) {
        window.addEventListener('load', startVc, false);
    } else {
        document.addEventListener('load', startVc, false);
    }

    function startVc() {
        bg = document.getElementById("vc-bg");
        document.getElementById("vc-right").addEventListener('scroll', showScrollBar);
        document.getElementById("vc-left").addEventListener('scroll', showScrollBar);
        hideBg();
        preLoad();
        //window.addEventListener('mousemove', setCursor)
    }

    var interval;
    var opacity = 0;
    var goDown = false;

    return {
        showBg: showBg,
        hideBg: hideBg,
        imgClick: imgClick
    }

    function setCursor(e) {
        if (e.clientY > window.innerHeight / 2) {
            document.body.style.cursor = "url('images/down.png'), auto";
            goDown = true;
        } else {
            document.body.style.cursor = "url('images/up.png'), auto";
            goDown = false;
        }
    }

    function showScrollBar() {
        if (!userScrolled) {
            console.log('first scroll');
            document.getElementById('scrollcolor').innerHTML = "<style>::-webkit-scrollbar-thumb {background: #FFDAB9!important;}</style>";
            userScrolled = true;
        }
    }

    function showBg() {
        console.log(bg);
        if (bg) {
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
    }

    function hideBg() {
        if (bg) {
            clearInterval(interval);
            interval = setInterval(function() {
                if (opacity > 0) {
                    bg.style.opacity = opacity;
                    opacity -= 0.1;
                } else {
                    clearInterval(interval);
                    bg.style.opacity = 0;
                    bg.style.backgroundImage = 'url(' + vcApp.backgroundImages[Math.floor(Math.random() * vcApp.backgroundImages.length)] + ')';
                }
            }, 10)
        }
    }

    function is_touch_device() {
        return 'ontouchstart' in window // works on most browsers 
            || navigator.maxTouchPoints; // works on IE10/11 and Surface
    }

    function imgClick(target) {

        if (window.innerWidth <= 767) {
            return
        }

        var isAtTop = target.getBoundingClientRect().top <= (target.parentNode.parentNode.id === 'vc-right' ? 100 : 0);
        var nextNode = target.parentNode.nextSibling.firstChild;
        var prevNode = target.parentNode.previousSibling.firstChild;
        if (!goDown && !isAtTop) {
            target = target;
        } else if (!goDown && isAtTop) {
            target = prevNode;
        } else if (goDown && !isAtTop) {
            target = target;
        } else if (goDown && isAtTop) {
            target = nextNode;
        }

        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer && scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);
        var targetY = scrollContainer.id === "vc-right" ? -100 : 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);

        scroll = function(c, a, b, i) {
                i++;
                if (i > 30) return;
                c.scrollTop = a + (b - a) / 30 * i;
                setTimeout(function() {
                    scroll(c, a, b, i);
                }, 5);
            }
            // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
}()
