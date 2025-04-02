document.addEventListener("DOMContentLoaded", function () {
    let toggleButton = document.querySelector(".navbar-toggle");
    let menu = document.querySelector("#navbar");

    if (toggleButton && menu) {
        toggleButton.addEventListener("click", function () {
            menu.classList.toggle("show");
        });
    }
});