<?php
header('Content-Type: application/json');
require_once __DIR__.'/../db.php';

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$userPhone = htmlspecialchars($_POST['userPhone']);
$password = htmlspecialchars($_POST['userPass']);
$password_confirm = htmlspecialchars($_POST['userPassRepeat']);

$param = ['email' => $email];
$sql_email = "SELECT count(`id`) AS total FROM `user` WHERE `email`= :email";
$query = $pdo->prepare($sql_email);

$errors = 0;

if ($password !== $password_confirm){
    $errors++;
}
//Проверка на существование пользователя с таким email
$query->execute($param);
if ($query->fetchColumn() != 0){
    $errors++;
}
if ($errors == 0)
{
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql_insert =  "INSERT INTO `user` (`id`, `email`, `password_hash`, `name`, `phone`) VALUES (NULL, :email, :hash, :name, :userPhone)";
    $query2 = $pdo->prepare($sql_insert);
    $param2 = ['email' => $email,
        'hash' => $hash,
        'name' => $name,
        'userPhone' => $userPhone
    ];
    $query2->execute($param2);
    //header('Location: ../index.php');
    echo json_encode(true);
} else
{
    echo json_encode(false);
}
