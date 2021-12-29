const { default: axios } = require("axios");

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

const buscador = document.querySelector("#buscador");
const resultados = document.querySelector(".resultados");

buscador.addEventListener("keyup", (e) => {
    if (e.keyCode == 13 && buscador.value != "") {
        let palabraBuscada = buscador.value.toLowerCase().trim();
        axios.get("./search/" + palabraBuscada).then((response) => {
            const peliculas = response.data;

            resultados.innerHTML = "";

            if (peliculas.length > 0) {
                for (let i = 0; i < 10; i++) {
                    resultados.innerHTML += `
                <li class="list-none border-b border-gray-700">
                    <a href="./movie/${peliculas[i].id}" class="block hover:bg-gray-700 px-3 py-3">
                        ${peliculas[i].title}
                    </a>
                </li>
                `;
                }
            } else {
                resultados.innerHTML += `
                <li class="list-none border-b border-gray-700 px-3 py-3">
                    No se encontraron resultados para "${buscador.value}"
                </li>
                `;
            }
        });
    } else {
        resultados.innerHTML = `
        <li class="list-none border-b border-gray-700 px-3 py-3">
            Ingresa una palabra para empezar a buscar...
        </li>
        `;
    }
});

buscador.addEventListener("focus", () => {
    resultados.classList.remove("hidden");
});

document.addEventListener("click", (e) => {
    if (e.target != buscador && e.target != resultados) {
        resultados.classList.add("hidden");
    }
});
