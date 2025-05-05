<?php
$conn = mysqli_connect("localhost", "root", "", "feedback_db");

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
?>