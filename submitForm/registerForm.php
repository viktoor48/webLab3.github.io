<?php
    header('Content-Type: application/json');
    require_once __DIR__.'/../db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $userPhone = $_POST['userPhone'];
    $password = $_POST['userPass'];
    $password_confirm = $_POST['userPassRepeat'];

    $errors = 0;

    if ($password !== $password_confirm){
        $errors++;
    }
    //Проверка на существование пользователя с таким email
    $sql_select_email = "SELECT count(`id`) AS total FROM `user` WHERE `email`= '$email'";
    $result = $pdo->query($sql_select_email)->fetchColumn();
    if ($result != 0){
        $errors++;
        /*print_r('Пользователь с таким email уже существует!');
        print_r($result);*/
    }
    if ($errors === 0)
    {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`id`, `email`, `password_hash`, `name`, `phone`) VALUES (NULL, '$email', '$hash', '$name', '$userPhone')";
        $pdo->query($sql);
        echo json_encode(['success' => true]);
    }
    //Иначе выводить alert
//    else
//    {
//        echo json_encode(false);
//    }
