



document.addEventListener('DOMContentLoaded', function () {
  const container = document.querySelector('.background-squares');
  for (let i = 0; i < 40; i++) {
    const square = document.createElement('div');
    square.classList.add('square');
    square.style.left = `${Math.random() * window.innerWidth}px`;
    square.style.top = `-10px`;
    square.style.width = `${Math.random() * 10 + 5}px`;
    square.style.height = square.style.width;
    square.style.animationDuration = `${Math.random() * 3 + 3}s`;
    container.appendChild(square);
  }
});