<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>


<section class="registration">
    <div class="my-container registration__container">
        <div class="bread-crumb">
            <p class="bread-crumb-p standard-paragraph">
                главная — <span class="bread-crumb-p_select">регистрация на сайте</span>
            </p>
        </div>
        <div class="catalog__title catalog-element__title title-red-line">
            <h2>регистрация на сайте</h2>
        </div>

        <form>
            <div class="questions__form-items-container">
                <div class="questions__form-items-left">
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>имя и фамилия</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>E-MAIL</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>Город</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>Пароль</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                </div>
                <div class="questions__form-items-right">
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>Номер телефона</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>компания</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>адрес сайта</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>повторите пароль</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                </div>
            </div>


            <div class="g-recaptcha" data-sitekey="6LdhTcgUAAAAACiErQzLi6t0Jye9llR8uZC_ef57"></div>

            <div class="filter__checkbox personal-policy">
                <label>
                    <input class="filter__checkbox-input" type="checkbox">
                    <p class="filter__checkbox-input-p">
                        Я согласен с <a href="#" class="element__questions-author-p_red">
                            Политикой обработки персональных данных</a
                    </p>
                </label>
            </div>
            <button type="submit" class="auth-form__button standard-paragraph">зарегистрироваться</button>
            <div class="registration__sign-btn standard-paragraph">
                УЖЕ ЕСТЬ АККАУНТ? <a href="#auth-form">ВОЙДИТЕ</a>
            </div>
        </form>


    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>