let currentIndex = 0;
const track = document.getElementById("carouselTrack");
const thumbnails = document.querySelectorAll(".thumbnail");
const thumbnailCount = thumbnails.length;

const updateCarousel = () => {
    const thumbWidth = thumbnails[0].offsetWidth + 20;
    const offset = -(currentIndex * thumbWidth);
    track.style.transition = "transform 0.5s ease";
    track.style.transform = `translateX(${offset}px)`;
};

document.getElementById("prevArrow").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + thumbnailCount) % thumbnailCount;
    updateCarousel();
});

document.getElementById("nextArrow").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % thumbnailCount;
    updateCarousel();
});

updateCarousel();
