const icons = document.querySelector("#icons");
const hiddenText = document.querySelector("#hiddenText")
const navBlur = document.querySelector("#navBlur")

icons.addEventListener("click", () => {
    nav.classList.toggle("active");
});

icons.addEventListener("click", () => {
    hiddenText.classList.toggle("active")
});

icons.addEventListener("click", () => {
    navBlur.classList.toggle("active")
});