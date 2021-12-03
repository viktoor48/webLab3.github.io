<?php
$password = "";
try {
 $dsn = 'mysql:host=localhost;dbname=announcebase;charset=utf8';
 $pdo = new PDO($dsn, 'root', $password);
} catch (PDOException $exception) {
 echo "Ошибка подключения к БД: " . $exception->getMessage();
 die();
}
