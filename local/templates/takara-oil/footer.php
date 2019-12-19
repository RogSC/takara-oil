<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>


</main>
<footer class="main-footer">
    <div class="my-container main-footer__container">
        <div class="main-footer__col main-footer__left">
            <a href="<?=SITE_DIR?>">
                <div class="main-footer__logo">
                    <?= GetContentSvgIcon('logo') ?>
                </div>
            </a>
            <div class="main-footer__mailing">
                <h4>Подпишитесь на рассылку</h4>
                <form class="main-footer__mailing-form">
                    <fieldset class="main-footer__mailing-form_fieldset">
                        <legend class="standard-paragraph">E-MAIL</legend>
                        <input type="email" class="main-footer__mailing-input standard-paragraph">
                    </fieldset>
                    <button type="submit" class="main-footer__mailing-btn standard-paragraph">Подписаться</button>
                </form>
                <p>Нажимая на кнопку вы соглашаетесь<br>с <a href="#">политикой обработки персональных данных</a></p>
            </div>
            <div class="main-footer__copyright">
                <h4>(C) TAKARA OIL</h4>
            </div>
        </div>
        <div class="main-footer__col main-footer__center">
            <div class="main-footer__nav">
                <ul>
                    <li class="standard-paragraph"><a href="#">Каталог</a></li>
                    <li class="standard-paragraph"><a href="#">Моторные масла</a></li>
                    <li class="standard-paragraph"><a href="#">Трансмиссионные масла</a></li>
                    <li class="standard-paragraph"><a href="#">Масла для гидроусилителя руля</a></li>
                    <li class="standard-paragraph"><a href="#">Масла для тормозной системы</a></li>
                    <li class="standard-paragraph"><a href="#">Масла для подвески</a></li>
                </ul>
            </div>
            <div class="main-footer__social">
                <ul>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-twitter') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-google') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-facebook') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-dribble') ?></a></li>
                </ul>
            </div>
        </div>
        <div class="main-footer__col main-footer__right">
            <div class="main-footer__nav">
                <ul>
                    <li class="standard-paragraph"><a href="#">Контакты</a></li>
                    <li class="standard-paragraph"><a href="#">Блог</a></li>
                    <li class="standard-paragraph"><a href="#">О бренде</a></li>
                    <li class="standard-paragraph"><a href="#">Личный кабинет</a></li>
                    <li class="standard-paragraph"><a href="#">Поиск по сайту</a></li>
                    <li class="standard-paragraph"><a href="#">Политика конфеденциальности</a></li>
                </ul>
            </div>
            <div class="main-footer__dev">
                <h4>дизайн и разработка сайта: <span>website96</span></h4>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/jquery.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/slider.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/filter.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/search.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/pickUpOilForm.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/productCatalog.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/auth.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>