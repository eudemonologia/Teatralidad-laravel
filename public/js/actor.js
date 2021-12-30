const movies = document.querySelectorAll(".movies .movie");
const seeAllmovies = document.querySelector(".movies .seeAllBtn");

const series = document.querySelectorAll(".series .serie");
const seeAllseries = document.querySelector(".series .seeAllBtn");

const images = document.querySelectorAll(".images .image");
const seeAllimages = document.querySelector(".images .seeAllBtn");

function seeLess(array, number) {
    for (let i = number; i < array.length; i++) {
        array[i].classList.add("hidden");
    }
}

function seeAll(array) {
    for (let i = 0; i < array.length; i++) {
        array[i].classList.remove("hidden");
    }
}

if (seeAllmovies != null) {
    seeAllmovies.addEventListener("click", () => {
        if (seeAllmovies.innerHTML.includes("películas")) {
            seeAllmovies.innerHTML = "Ver menos";
            seeAll(movies);
        } else {
            seeAllmovies.innerHTML = "Ver todas las películas";
            seeLess(movies, 10);
        }
    });
}

if (seeAllseries != null) {
    seeAllseries.addEventListener("click", () => {
        if (seeAllseries.innerHTML.includes("series")) {
            seeAllseries.innerHTML = "Ver menos";
            seeAll(series);
        } else {
            seeAllseries.innerHTML = "Ver todas las series";
            seeLess(series, 10);
        }
    });
}

if (seeAllimages != null) {
    seeAllimages.addEventListener("click", () => {
        if (seeAllimages.innerHTML.includes("imágenes")) {
            seeAllimages.innerHTML = "Ver menos";
            seeAll(images);
        } else {
            seeAllimages.innerHTML = "Ver todas las imágenes";
            seeLess(images, 5);
        }
    });
}

seeLess(movies, 10);
seeLess(series, 10);
seeLess(images, 5);
