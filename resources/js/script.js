// navbar
const header = document.querySelector("header");
const fixNav = header.offsetTop;

window.addEventListener("scroll", () => {
    if (window.scrollY > fixNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
});
