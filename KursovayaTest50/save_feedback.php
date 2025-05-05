<?php
header('Content-Type: text/plain'); // Упрощаем ответ

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Доступ запрещен');
}

// Получение данных
$title = $_POST['title'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Подключение к БД
$db = new mysqli('localhost', 'root', '', 'feedback_db');

// Проверка соединения
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

// Подготовка запроса
$stmt = $db->prepare("INSERT INTO feedback (title, name, email, message, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("ssss", $title, $name, $email, $message);

// Выполнение запроса
if ($stmt->execute()) {
    echo "success"; // Простой ответ об успехе
} else {
    echo "Ошибка: " . $stmt->error;
}

// Закрытие соединения
$stmt->close();
$db->close();
?>