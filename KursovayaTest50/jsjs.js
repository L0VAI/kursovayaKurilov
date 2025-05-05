
// test пройден слайдер ниже




document.addEventListener('DOMContentLoaded', () => {
  const headerLinks = document.querySelectorAll('header a');
  const slides = document.querySelectorAll('.slider-slide');
  let currentSlide = 0;

  headerLinks.forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      const slideIndex = parseInt(link.dataset.slide, 10);
      goToSlide(slideIndex);
    });
  });

  function goToSlide(index) {
    if (index >= 0 && index < slides.length) {
      slides.forEach(slide => slide.classList.remove('slideActive'));
      slides[index].classList.add('slideActive');
      currentSlide = index;
    }
  }
});
document.addEventListener('DOMContentLoaded', function() {
  const burger = document.getElementById('burger');
  const menu = document.getElementById('menu');

  burger.addEventListener('click', function() {
      menu.classList.toggle('active'); // Добавляем/убираем класс active
  });
});

















