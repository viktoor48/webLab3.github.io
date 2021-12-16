<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Announce</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header_body">
                <a href="" class="header_logo">
                    <img src="Logo/logo.svg" alt="">
                </a>
                <div class="header_burger">
                    <span></span>
                </div>
                <nav class="header_menu">
                    <ul class="header_list">
                        <?php
                        if (!empty($_SESSION['user'])){
                            ?>
                        <li><a href="#" class="header_link">Привет, <?= $_SESSION['user']['name']?></a></li>
                        <li><a href="logout.php" class="header_link logout lock">Выйти</a></li>
                        <?php
                        }else{
                            ?>
                        <li><a href="#" class="header_link enter">Войти</a></li>
                        <?php
                        }
                        ?>
                        <li><a href="#" class="header_link registration">Регистрация</a></li>
                        <li><a href="#" class="header_link">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="content">