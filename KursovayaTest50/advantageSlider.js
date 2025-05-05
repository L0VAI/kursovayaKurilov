
document.addEventListener('DOMContentLoaded', function() {
    const advantageSlider = document.querySelector('.advantageSlider');
    const advantageSlides = document.querySelectorAll('.advantageSlide');
    const arrowLeft = document.querySelector('.arrow-left');
    const arrowRight = document.querySelector('.arrow-right');
    let currentadvantageSlide = 0;
    const advantageSlideCount = advantageSlides.length;
    function updateadvantageSlides() {
        advantageSlides.forEach((advantageSlide, index) => {
            if (index === currentadvantageSlide) {
                advantageSlide.classList.add('active');
            } else {
                advantageSlide.classList.remove('active');}});  }
    function goToadvantageSlide(index) {
        if (index < 0) {
            currentadvantageSlide = advantageSlideCount - 1;
        } else if (index >= advantageSlideCount) {
            currentadvantageSlide = 0;
        } else {
            currentadvantageSlide = index;}   
        advantageSlider.style.transform = `translateX(-${currentadvantageSlide * 100}%)`;
        updateadvantageSlides();}
    arrowLeft.addEventListener('click', () => {
        goToadvantageSlide(currentadvantageSlide - 1);});
    arrowRight.addEventListener('click', () => {
        goToadvantageSlide(currentadvantageSlide + 1);});
    updateadvantageSlides();});