var vcApp = function() {
    var bg;
    var interval;
    var opacity = 0;
    window.onload = function() {
        bg = document.getElementById("vc-bg");
    }

    return {
        showBg: showBg,
        hideBg: hideBg,
        imgClick: imgClick
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

    function imgClick(target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);

        var targetY = -100// -((window.innerHeight / 2) - (target.height / 2));
        console.log(window.innerHeight, target.height, targetY);
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
