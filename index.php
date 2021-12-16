<?php
session_start();
require 'db.php';
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
            <section class="page_products products">
                <div class="container">
                    <h2 class="products_title">Наши объявления</h2>
                    <div class="product_items">
                    <?php
                        $pageSize = 3;
                        $sql =  "SELECT * FROM post LIMIT $pageSize OFFSET 0";
                        $items = $pdo->query($sql);
                     ?>
                     <?php foreach($items as $item)
                     {
                     ?>
                        <article data-pid="<?php print_r($item['id'])?>" class="product_item item_product">
                            <a href="detail_page.php?id=<?php print_r($item['id'])?>" class="item-product_image _ibg">
                                <img src="image/<?php print_r($item['image']) ?>" alt="">
                            </a>
                            <div class="item-product_body">
                                <div class="item-product_content">
                                    <h3 class="item-product_title"><?php print_r($item['title'])?></h3>
                                    <div class="item-product_text"><?php print_r($item['text']) ?></div>
                                </div>
                                <div class="item-product_prices">
                                    <div class="item-product_price">Price <?php print_r($item['price'])?> ₽</div>
                                </div>
                                <div class="item-product_actions actions-product">
                                    <div class="actions-product_body">
                                        <a href="detail_page.php?id=<?php print_r($item['id'])?>" target="_blank" class="actions-product_button btn btn_white">Show details</a>
                                        <a href="#" class="actions-product_link _icon-favorite">Like</a>
                                        <ion-icon name ="heart"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </article>
                     <?php };?>
                    </div>
                    <div class="products_footer">
                        <a id="more_posts" href="/more_posts.php" data-next-page="2" class="products_more btn btn_white">Load More</a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer class="footer">© Сделано в России, 2021 г. Все права защищены.</footer>
    <div id="popup_reg" class="popups_inner">
        <!--Форма регистрации-->
        <div class="form_registration">
            <a href="#" class="close_popup">Х</a>
            <form action="#" id="form-registration-id" class="form_body" name="form_reg_name">
                <h1 class="form_title">Регистрация</h1>
                <div class="form_item">
                    <label for="formName" class="form_label">Имя:</label>
                    <input id="formName" type="text" name="name" placeholder="Иван" class="form_input name _req">
                </div>
                <div class="form_item">
                    <label for="formEmail" class="form_label">E-mail:</label>
                    <input id="formEmail" type="email" name="email" placeholder="example@list.ru" class="form_input _req _email">
                </div>
                <div class="form_item">
                    <label for="formPhone" class="form_label">Телефон:</label>
                    <input id="formPhone" type="tel" name="userPhone" placeholder="+79192569330" class="form_input _req _phone">
                </div>
                <div class="form_item">
                    <label for="formPass" class="form_label">Пароль:</label>
                    <input id="formPass" type="password" name="userPass" class="form_input _req _pass">
                </div>
                <div class="form_item">
                    <label for="formPass-repeat" class="form_label">Повторите пароль:</label>
                    <input id="formPass-repeat" type="password" name="userPassRepeat" class="form_input _req _pass-repeat">
                </div>
                <div class="form_item">
                    <div class="checkbox">
                        <input checked id="formAgreement" type="checkbox" name="agreement" class="checkbox_input _req">
                        <label for="formAgreement" class="checkbox_label"><span>Я даю свое согласие на обработку персональных данных в соответствии с <a href="#">условиями</a>*</span></label>
                    </div>
                </div>
                <button type="submit" class="form_button">Зарегестрироваться</button>
                <p class="link_on">
                    У вас уже есть аккаунт? - <a href="#" class="link_to_enterForm">авторизируйтесь</a>!
                </p>
            </form>
        </div>
        <!--Конец Формы регистрации-->
    </div>
    <div id="popup_enter" class="popups_inner">
        <!--Форма входа-->
        <div class="form_enter">
            <a href="#" class="close_popup">Х</a>
            <form action="#" id="form-enter-id" class="form_body" name="form_enter_name">
                <h1 class="form_title">Вход</h1>
                <div class="form_item">
                    <label for="login" class="form_label">Логин:</label>
                    <input id="login" type="text" name="userName" class="form_input _req">
                </div>
                <div class="form_item">
                    <label for="user-pass" class="form_label">Пароль:</label>
                    <input id="user-pass" type="password" name="userPassword" class="form_input _req _userPass">
                </div>
                <button type="submit" class="form_button">Войти</button>
                <p class="link_on">
                    У вас нет аккаунта? - <a href="#" class="link_to_registrationForm">зарегистрируйтесь</a>!
                </p>
            </form>
        </div>
        <!--Конец Формы входа-->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="script.js"></script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script >
<script  nomodule  src = "https: // unpkg .com / ionicons @ 5.5.2 / dist / ionicons / ionicons.js "> </script >
</body>
</html>