<?php
header('Content-Type: application/json');

$name = htmlspecialchars($_POST['name']);
$name = htmlspecialchars($_POST['category']);
$name = htmlspecialchars($_POST['price']);
$name = htmlspecialchars($_POST['description']);

$path = 'image/' . time() . $_FILES['image']['name'];

//какая-то проверка
move_uploaded_file($_FILES['image']['tmp_name'],$path);