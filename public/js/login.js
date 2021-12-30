const modal = document.querySelector(".modal");
const login = document.querySelector(".login");
const openModalLoginBtn = document.querySelector(".openModalLoginBtn");
const closeModalLoginBtn = document.querySelector(".closeModalLoginBtn");

openModalLoginBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    if (login.classList.contains("hidden")) {
        login.classList.remove("hidden");
    }
});

closeModalLoginBtn.addEventListener("click", () => {
    modal.classList.add("hidden");
});

modal.addEventListener("click", (e) => {
    if (e.target == modal) {
        modal.classList.add("hidden");
    }
});
