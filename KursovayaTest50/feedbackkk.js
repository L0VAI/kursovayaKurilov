// Блокировка вставки
document.querySelectorAll('input, textarea').forEach(function(el) {
  el.addEventListener('paste', function(e) { e.preventDefault(); });
  el.addEventListener('contextmenu', function(e) { e.preventDefault(); });
});

// Валидация заголовка
function validateTitle() {
  const input = document.getElementById('title');
  const error = document.getElementById('titleError');
  const counter = document.getElementById('titleCounter');
  const value = input.value;
  const remaining = 100 - value.length;
  
  counter.textContent = `Осталось символов: ${remaining}`;
  
  if (value.length === 0) {
    error.textContent = 'Введите заголовок';
    input.className = 'invalid';
  } else {
    error.textContent = '';
    input.className = 'valid';
  }
  
  checkForm();
}

// Валидация имени (упрощённая версия без проверки на буквы)
function validateName() {
  const input = document.getElementById('name');
  const error = document.getElementById('nameError');
  const counter = document.getElementById('nameCounter');
  const value = input.value;
  const remaining = 12 - value.length;
  
  counter.textContent = `Осталось символов: ${remaining}`;
  
  if (value.length === 0) {
    error.textContent = 'Введите имя';
    input.className = 'invalid';
  } else if (value.length > 12) {
    error.textContent = 'Не более 12 символов';
    input.className = 'invalid';
  } else {
    error.textContent = '';
    input.className = 'valid';
  }
  
  checkForm();
}

// Валидация email
function validateEmail() {
  const input = document.getElementById('email');
  const error = document.getElementById('emailError');
  const value = input.value;
  
  if (value.length === 0) {
    error.textContent = 'Введите email';
    input.className = 'invalid';
  } else if (!value.includes('@')) {
    error.textContent = 'Должен содержать @';
    input.className = 'invalid';
  } else {
    error.textContent = '';
    input.className = 'valid';
  }
  
  checkForm();
}

// Валидация сообщения
function validateMessage() {
  const input = document.getElementById('message');
  const error = document.getElementById('messageError');
  const counter = document.getElementById('messageCounter');
  const value = input.value;
  const words = value.trim() === '' ? 0 : value.trim().split(/\s+/).length;
  const remaining = 255 - words;
  
  counter.textContent = `Осталось слов: ${remaining}`;
  
  if (value.length === 0) {
    error.textContent = 'Введите сообщение';
    input.className = 'invalid';
  } else if (words > 255) {
    error.textContent = 'Не более 255 слов';
    input.className = 'invalid';
  } else {
    error.textContent = '';
    input.className = 'valid';
  }
  
  checkForm();
}

// Проверка всей формы
function checkForm() {
  const submitBtn = document.getElementById('submitBtn');
  const inputs = [
    document.getElementById('title'),
    document.getElementById('name'),
    document.getElementById('email'),
    document.getElementById('message')
  ];
  
  const allValid = inputs.every(input => input.className === 'valid');
  submitBtn.disabled = !allValid;
}

// Функция для отправки формы
function submitForm(event) {
  event.preventDefault();
  
  const form = document.getElementById('feedbackForm');
  const formData = new FormData(form);
  const successMessage = document.getElementById('successMessage');
  const submitBtn = document.getElementById('submitBtn');
  
  // Блокируем кнопку на время отправки
  submitBtn.disabled = true;
  submitBtn.textContent = 'Отправка...';
  
  fetch('save_feedback.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    if (data === 'success') {
      // Показываем сообщение об успехе
      successMessage.style.display = 'block';
      // Очищаем форму
      form.reset();
      // Сбрасываем стили валидации
      document.querySelectorAll('input, textarea').forEach(el => {
        el.className = '';
        el.dispatchEvent(new Event('input'));
      });
      // Скрываем сообщение через 5 секунд
      setTimeout(() => {
        successMessage.style.display = 'none';
      }, 5000);
    } else {
      alert('Ошибка: ' + data);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Произошла ошибка при отправке');
  })
  .finally(() => {
    submitBtn.textContent = 'Отправить';
    checkForm(); // Проверяем форму снова
  });
}