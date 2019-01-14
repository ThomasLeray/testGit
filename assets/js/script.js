(function () {
    "use strict";
    var swipeContainer = document.getElementById("wrapper");
    var edt = document.getElementById("edt");
    var days = document.getElementById("jours");
    var position = 0;




    document.addEventListener("DOMContentLoaded", initialize);

    function initialize(evt) {
        window.addEventListener("touchstart", startTouch, false);
        window.addEventListener("touchmove", moveTouch, false);

        // Swipe Up / Down / Left / Right
        var initialX = null;
        var initialY = null;

        function startTouch(e) {
            initialX = e.touches[0].clientX;
            initialY = e.touches[0].clientY;
        };

        function moveTouch(e) {
            if (initialX === null) {
                return;
            }

            if (initialY === null) {
                return;
            }

            var currentX = e.touches[0].clientX;
            var currentY = e.touches[0].clientY;

            var diffX = initialX - currentX;
            var diffY = initialY - currentY;

            if (Math.abs(diffX) > Math.abs(diffY)) {
                // sliding horizontally
                if (diffX > 0) {
                    // swiped left
                    nextDay();
                } else {
                    // swiped right
                    prevDay();
                }
            }

            initialX = null;
            initialY = null;

        };

    }

    function nextDay() {
        if (position < 400) {
            position = position + 100;
        }
        edt.style.right = position + "vw";
        days.style.right = position + "vw";
    }

    function prevDay() {
        if (position != 0) {
            position = position - 100;
        }
        edt.style.right = position + "vw";
        days.style.right = position + "vw";
    }

}());