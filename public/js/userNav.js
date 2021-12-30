const userMenuBtn = document.querySelector(".userMenuBtn");
const userMenu = document.querySelector(".userMenu");

userMenuBtn.addEventListener("click", () => {
    userMenu.classList.toggle("hidden");
});
