const { default: axios } = require("axios");

const buscador = document.querySelector("#buscador");
const resultados = document.querySelector(".resultados");
const nav = document.querySelector("nav");
let scrollPosition = 0;

buscador.addEventListener("keyup", (e) => {
    if (e.keyCode == 13 && buscador.value != "") {
        let palabraBuscada = buscador.value.toLowerCase().trim();
        axios.get("/search/" + palabraBuscada).then((response) => {
            const peliculas = response.data;

            console.log(peliculas);

            resultados.innerHTML = "";

            if (peliculas.length > 0) {
                for (let i = 0; i < 10; i++) {
                    if (peliculas[i].media_type == "movie") {
                        resultados.innerHTML += `
                    <li class="list-none border-b border-gray-700">
                        <a href="/movie/${peliculas[i].id}" class="block hover:bg-gray-700 px-3 py-3">
                            ${peliculas[i].title} | Película
                        </a>
                    </li>
                    `;
                    } else if (peliculas[i].media_type == "tv") {
                        resultados.innerHTML += `
                    <li class="list-none border-b border-gray-700">
                        <a href="/serie/${peliculas[i].id}" class="block hover:bg-gray-700 px-3 py-3">
                            ${peliculas[i].name} | Serie
                        </a>
                    </li>
                    `;
                    } else if (peliculas[i].media_type == "person") {
                        resultados.innerHTML += `
                    <li class="list-none border-b border-gray-700">
                        <a href="/actor/${
                            peliculas[i].id
                        }" class="block hover:bg-gray-700 px-3 py-3">
                            ${peliculas[i].name} | ${
                            peliculas[i].gender == 2 ? "actor" : "actriz"
                        }
                        </a>
                    </li>
                    `;
                    }
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

document.addEventListener("scroll", (e) => {
    if (scrollPosition < window.scrollY) {
        nav.classList.add("opacity-50");
        scrollPosition = window.scrollY;
    } else {
        nav.classList.remove("opacity-50");
        scrollPosition = window.scrollY;
    }
});

nav.addEventListener("mouseover", (e) => {
    if (nav.classList.contains("opacity-50")) {
        nav.classList.remove("opacity-50");
    }
});

nav.addEventListener("mouseout", (e) => {
    if (!nav.classList.contains("opacity-50")) {
        nav.classList.add("opacity-50");
    }
});

const likeBtn = document.querySelector(".likeBtn");
const counter = document.querySelector(".likeBtn .counter");

if (likeBtn) {
    likeBtn.addEventListener("click", () => {
        axios
            .post("/movie/" + likeBtn.dataset.id + "/like", {
                id_user: likeBtn.dataset.user,
            })
            .then((response) => {
                counter.innerHTML = response.data;
                likeBtn.classList.remove("bg-orange-500");
                likeBtn.classList.add("bg-gray-500");
            });
    });
}
