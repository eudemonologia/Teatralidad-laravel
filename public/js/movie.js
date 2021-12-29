const actors = document.querySelectorAll(".cast .actor");
const seeAllActors = document.querySelector(".cast .seeAllBtn");

const images = document.querySelectorAll(".images .image");
const seeAllImages = document.querySelector(".images .seeAllBtn");

// Mostrar solo e actores
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

seeAllActors.addEventListener("click", () => {
    if (seeAllActors.innerHTML == "Ver todos los actores") {
        seeAllActors.innerHTML = "Ver menos";
        seeAll(actors);
    } else {
        seeAllActors.innerHTML = "Ver todos los actores";
        seeLess(actors, 10);
    }
});

seeAllImages.addEventListener("click", () => {
    if (seeAllImages.innerHTML == "Ver todas las imágenes") {
        seeAllImages.innerHTML = "Ver menos";
        seeAll(images);
    } else {
        seeAllImages.innerHTML = "Ver todas las imágenes";
        seeLess(images, 9);
    }
});

seeLess(actors, 10);
seeLess(images, 9);
