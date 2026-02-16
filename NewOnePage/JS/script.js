const hamburger = document.getElementById("hamburger");
const options = document.querySelector(".options");

hamburger.addEventListener("click", () => {
    options.classList.toggle("active");
});