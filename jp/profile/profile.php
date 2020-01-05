<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

    <section class="profile">
        <div class="my-container profile__container">
            <div class="bread-crumb">
                <p class="bread-crumb-p standard-paragraph">
                    главная — <span class="bread-crumb-p_select">профиль</span>
                </p>
            </div>
            <div class="catalog__title catalog-element__title title-red-line">
                <h2>профиль</h2>
            </div>
            <div class="profile-section__title">
                <p class="profile-section__title-p">Мои данные</p>
            </div>
            <form>
                <div class="questions__form-items-container profile__form-items-container">
                    <div class="questions__form-items-left">
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>ваше имя</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
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
                    </div>
                    <div class="questions__form-items-right">
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>фамилия</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>e-mail</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>город</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
                        <button type="submit" class="profile__btn auth-form__button standard-paragraph">сохранить</button>
                    </div>
                </div>
            </form>
            <div class="profile-section__title">
                <p class="profile-section__title-p">Изменение пароля</p>
            </div>
            <form>
                <div class="questions__form-items-container profile__form-items-container">
                    <div class="questions__form-items-left">
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>введите новый пароль</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
                    </div>
                    <div class="questions__form-items-right">
                        <div class="questions__form-item-container">
                            <fieldset class="questions__form-item">
                                <legend>повторите пароль</legend>
                                <input type="text" class="main-footer__mailing-input standard-paragraph">
                            </fieldset>
                        </div>
                        <button type="submit" class="profile__btn auth-form__button standard-paragraph">изменить пароль</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?
$APPLICATION->IncludeFile(
    "views/callback.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php",
    )
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>