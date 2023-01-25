const gotopBtn = document.querySelector("#gotopBtn");
const nav = document.querySelector("nav");

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        gotopBtn.style.display = "block";
        nav.style.background = "black";
    } else {
        gotopBtn.style.display = "none";
        nav.style.background = "transparent";
    }
}