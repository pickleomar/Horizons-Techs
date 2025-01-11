let slideIndex = 0;
let autoSlideInterval;

// Function to show the slides
function showSlides() {
    const slides = document.querySelectorAll('.slide');
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(-${slideIndex * 100}%)`;
    });
}

// Next Slide
function nextSlide() {
    const slides = document.querySelectorAll('.slide');
    slideIndex = (slideIndex + 1) % slides.length;
    showSlides();
}

// Previous Slide
function prevSlide() {
    const slides = document.querySelectorAll('.slide');
    slideIndex = (slideIndex - 1 + slides.length) % slides.length;
    showSlides();
}

// Auto Slide
function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 10000); // Change slides every 5 seconds
}

// Pause Auto Slide
function pauseAutoSlide() {
    clearInterval(autoSlideInterval);
}

// Attach event listeners
document.addEventListener('DOMContentLoaded', () => {
    // Start auto-sliding when the page loads
    startAutoSlide();

    // Event listeners for navigation arrows
    document.querySelector('.arrow.left').addEventListener('click', prevSlide);
    document.querySelector('.arrow.right').addEventListener('click', nextSlide);

    // Pause auto-slide on hover
    const slideshowContainer = document.querySelector('.slideshow-container');
    slideshowContainer.addEventListener('mouseenter', pauseAutoSlide);
    slideshowContainer.addEventListener('mouseleave', startAutoSlide);
});
