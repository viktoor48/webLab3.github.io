<?php require 'Template/header.html'; ?>
<head><link rel="stylesheet" href="detail_page.css" type="text/css"></head>
<?php
require 'db.php';
$id = $_GET['id'];
$sql =  "SELECT * FROM post WHERE id=$id";
$items = $pdo->query($sql);
?>
<?php foreach($items as $item)
           {
           ?>
            <section class="product">
                <div class="container container-detail_pg">
                    <h1 class="product_title"><?php print_r($item['title'])?><span><?php print_r($item['text'])?></span></h1>
                    <div class="product_content">
                        <div class="product_images">
                            <a href="#" class="images-product_image">
                                <img src="image/<?php print_r($item['image'])?>" alt="">
                            </a>
                        </div>
                        <div class="product_body">
                            <div class="product_price">Price <?php print_r($item['price'])?> ₽</div>
                            <div class="actions-product_body">
                                <a href="#" target="_blank" class="actions-product_button btn btn_white detail_pg">Откликнуться</a>
                                <a href="#" target="_blank" class="actions-product_button btn btn_white detail_pg">Показать номер телефона</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_info info-product _tabs">
                        <nav class="info-product_nav">
                            <div class="info-product_item _tabs-item _active"><span>Описание</span></div>
                        </nav>
                        <div class="info-product_body">
                            <div class="info-product_block _tabs-block _active">
                                <p>Стул MANS подходит для оформления интерьеров столовых, кухонь и гостиных, а также для дополнения к письменному столу.</p>

                                <p>Каркас и ножки из твердой породы древесины<br>
                                Основа стула, ножки и спинка изготовлены из массива гевеи. Материал отличается прочностью и устойчивостью к действию влаги и перепадам температуры.</p>

                                <p>Эргономичный дизайн для максимального комфорта<br>
                                Мягкое сидение обеспечивает удобную посадку. Обивка выполнена из плотной натуральной ткани. Спинка стула повторяет анатомические изгибы тела, позволяя принимать естественную, не утомляющую позу.</p>

                                <p>Симбиоз экологичности и практичности<br>
                                Обеденный стул MANS:<br>

                                выдерживает нагрузку до 120 кг;<br>
                                не выделяет вредных веществ;<br>
                                имеет небольшой вес;<br>
                                отличается прочностью конструкции.<br>
                                Находка для современных интерьеров<br>
                                Благодаря устойчивости массива гевеи к воздействию влаги и перепаду температур стул подходит для эксплуатации в разных типах помещений: на кухне и даче, в столовых и гостиных.<br>

                                Дизайн изделия позволяет органично вписать его в большинство современных интерьеров, от популярного сегодня скандинавского до неоклассики.<br>

                                Деревянный обеденный стул – беспроигрышный вариант для обустройства помещений в экостиле.<br>

                                Гарантии и доставка<br>
                                Компания STOOL GROUP реализует продукцию лучших производителей барной и столовой мебели. Все товары отвечают стандартам качества и имеют гарантийные сертификаты. Доставка осуществляется по территории России и в страны СНГ.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php };?>
       <?php require 'Template/footer.html'; ?>
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
                        <label for="formAgreement" class="checkbox_label"><span>Я даю свое согласие на обработку персональных данных в соответствии с <a href="">условиями</a>*</span></label>
                    </div>
                </div>
                <button type="submit" class="form_button">Зарегестрироваться</button>
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
            </form>
        </div>
        <!--Конец Формы входа-->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="script.js"></script>
</body>
</html>

