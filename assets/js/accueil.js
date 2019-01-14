var btn = document.getElementById("btnMenu");
var btn2 = document.getElementById("btnMenu2");
var burger_overlay = document.getElementById("burger-overlay");
var menu = document.querySelector("nav");
var fond = document.getElementById("burger-overlay");
btn.addEventListener("click", showMenu);
btn2.addEventListener("click", hideMenu);
burger_overlay.addEventListener("click", hideMenu);


function showMenu(evt) {
    btn.removeEventListener("click", showMenu);
    btn.addEventListener("click", hideMenu);
    btn2.removeEventListener("click", showMenu);
    btn2.addEventListener("click", hideMenu);
    menu.style.left = "0";
    fond.style.display = "block";
    fond.style.opacity = "1";
}

function hideMenu(evt) {
    btn.removeEventListener("click", hideMenu);
    btn.addEventListener("click", showMenu);
    btn2.removeEventListener("click", hideMenu);
    btn2.addEventListener("click", showMenu);
    menu.style.left = "-100vw";
    fond.style.display = "none";
    fond.style.opacity = "0";
}