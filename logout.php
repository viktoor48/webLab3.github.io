<?php
session_start();
unset($_SESSION['user']);
header('Location: /index.php');
//header('Location: ../index.php');