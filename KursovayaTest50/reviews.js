



document.querySelectorAll('.like-count').forEach(el => {
    el.textContent = Math.floor(Math.random() * 10) + 1;});
document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if (!this.classList.contains('liked')) {
            const count = this.querySelector('.like-count');
            count.textContent = parseInt(count.textContent) + 1;
            this.classList.add('liked');}});});
document.querySelectorAll('.read-more').forEach(btn => {
    btn.addEventListener('click', function() {
        const fullText = this.closest('.review').querySelector('.review-full');
        if (fullText.style.display === 'none') {
            fullText.style.display = 'block';
            this.textContent = 'Свернуть';
        } else {
            fullText.style.display = 'none';
            this.textContent = 'Читать полностью';}});});
document.querySelector('.show-all').addEventListener('click', function() {
    alert('Все отзывы');});