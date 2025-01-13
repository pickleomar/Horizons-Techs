let slideIndex = 0;
let autoSlideInterval;

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(-${slideIndex * 100}%)`;
    });
}

function nextSlide() {
    pauseAutoSlide(); // Pause the auto-slide during transition
    const slides = document.querySelectorAll('.slide');
    slideIndex = (slideIndex + 1) % slides.length;
    showSlides();
    startAutoSlide(); // Restart the auto-slide
}

function prevSlide() {
    pauseAutoSlide(); // Pause the auto-slide during transition
    const slides = document.querySelectorAll('.slide');
    slideIndex = (slideIndex - 1 + slides.length) % slides.length;
    showSlides();
    startAutoSlide(); // Restart the auto-slide
}

function startAutoSlide() {
    console.log('Starting auto-slide...');
    autoSlideInterval = setInterval(() => {
        console.log('Auto-sliding to next slide...');
        nextSlide();
    }, 15000); // 10 seconds
}

function pauseAutoSlide() {
    console.log('Pausing auto-slide...');
    clearInterval(autoSlideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    if (slides.length === 0) {
        console.error('No slides found.');
        return;
    }

    startAutoSlide();

    const leftArrow = document.querySelector('.arrow.left');
    const rightArrow = document.querySelector('.arrow.right');
    if (leftArrow) leftArrow.addEventListener('click', prevSlide);
    if (rightArrow) rightArrow.addEventListener('click', nextSlide);

    const slideshowContainer = document.querySelector('.slideshow-container');
    if (slideshowContainer) {
        slideshowContainer.addEventListener('mouseenter', pauseAutoSlide);
        slideshowContainer.addEventListener('mouseleave', startAutoSlide);
    }
});
