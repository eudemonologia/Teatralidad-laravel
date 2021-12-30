// Escrolear con botones el carrusel pasado por parametro
function scrolling(htmlclass) {
    const fowardBtn = document.querySelector(htmlclass + " .forwardBtn");
    const backBtn = document.querySelector(htmlclass + " .backBtn");
    const scrollMovies = document.querySelector(htmlclass + " .scrollMovies");

    fowardBtn.addEventListener("click", () => {
        scrollMovies.scrollLeft += 800;
    });

    backBtn.addEventListener("click", () => {
        scrollMovies.scrollLeft -= 800;
    });

    scrollMovies.addEventListener("scroll", () => {
        if (scrollMovies.scrollLeft == 0) {
            backBtn.classList.remove("opacity-100");
            backBtn.classList.add("opacity-0");
        } else {
            backBtn.classList.remove("opacity-0");
            backBtn.classList.add("opacity-100");
        }

        if (
            scrollMovies.scrollLeft ==
            scrollMovies.scrollWidth - scrollMovies.clientWidth
        ) {
            fowardBtn.classList.remove("opacity-100");
            fowardBtn.classList.add("opacity-0");
        } else {
            fowardBtn.classList.remove("opacity-0");
            fowardBtn.classList.remove("opacity-100");
        }
    });
}

//Iniciando las funciones
scrolling(".popularActors");
