<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<section class="modal-window" id="auth-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-close.svg">
            </a>
        </div>

        <?
        if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
            ShowMessage($arResult['ERROR_MESSAGE']);
        ?>

        <div class="modal-window__title">
            <h2 class="title-red-line">Войти<br>в личный кабинет</h2>
        </div>
        <form name="system_auth_form<?=$arResult["RND"]?>"
              method="post" action="<?=$arResult["AUTH_URL"]?>"
              onsubmit="return formValid();">
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>E-MAIL</legend>
                    <input class="main-footer__mailing-input standard-paragraph"
                           type="text"
                           name="USER_EMAIL"
                           maxlength="50" value="" size="17">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Пароль</legend>
                    <input class="main-footer__mailing-input standard-paragraph"
                           type="text"
                           name="USER_PASSWORD"
                           maxlength="255"
                           size="17"
                           autocomplete="off">
                </fieldset>
            </div>

            <div class="g-recaptcha" data-sitekey="6LdHWsgUAAAAAFhSOjmgy6GWAC3cyIybNXsmtvX8"></div>

            <button type="submit" class="auth-form__button standard-paragraph">Войти</button>
            <div class="auth-form__forgot-pass">
                <a href="#forgot-pass-form">
                    <p class="standard-paragraph">забыли пароль?</p>
                </a>
            </div>

            <div class="modal-window__separator">
                <div class="modal-window__separator-line"></div>
                <p class="modal-window__separator-p">ИЛИ</p>
                <div class="modal-window__separator-line"></div>
            </div>
            <a href="#">
                <div class="auth-form__button_reg standard-paragraph">
                    зарегистрироваться
                </div>
            </a>
        </form>
    </div>
</section>
