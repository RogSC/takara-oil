<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<section class="modal-window" id="auth-form"
         <? if($_REQUEST["login"] === "yes"): ?>
         style="display: block;"
        <?endif?>>

    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line">Войти<br>в личный кабинет</h2>
        </div>

        <form name="form_auth2" method="post" id="auth-form__form"
              action="<?= $arResult["AUTH_URL"] ?>">
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>
            <? if (strlen($arResult["BACKURL"]) > 0): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <? endforeach ?>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>E-MAIL</legend>
                    <input class="main-footer__mailing-input standard-paragraph"
                           type="text"
                           name="USER_LOGIN"
                           maxlength="50" value="<?= $arResult["LAST_LOGIN"] ?>" size="17" required>
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Пароль</legend>
                    <input class="main-footer__mailing-input standard-paragraph"
                           type="password"
                           name="USER_PASSWORD"
                           maxlength="255"
                           size="17"
                           autocomplete="off" required>
                </fieldset>
            </div>

            <div class="g-recaptcha" data-sitekey="6LdHWsgUAAAAAFhSOjmgy6GWAC3cyIybNXsmtvX8"></div>

            <input type="hidden" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
            <button type="submit" name="Login" class="auth-form__button standard-paragraph">Войти</button>
            <div class="auth-form__forgot-pass">
                <a href="#forgot-pass-form">
                    <p class="standard-paragraph">забыли пароль?</p>
                </a>
            </div>

            <div class="modal-window__auth-error">
                <?
                ShowMessage($arParams["~AUTH_RESULT"]);
                ShowMessage($arResult['ERROR_MESSAGE']);
                ?>
            </div>

            <div class="modal-window__separator">
                <div class="modal-window__separator-line"></div>
                <p class="modal-window__separator-p">ИЛИ</p>
                <div class="modal-window__separator-line"></div>
            </div>
            <a href="/auth/registration.php">
                <div class="auth-form__button_reg standard-paragraph">
                    зарегистрироваться
                </div>
            </a>

            <script>
                <? if(!$USER->IsAuthorized()): ?>
                    $(".header__user-menu").click(function () {
                        $("#auth-form").show();
                    });
                <?endif?>

                $(".modal-window__close").click(function () {
                    $("#auth-form").hide();
                });
            </script>



            <!--<script>
                $('#auth-form__form').off('submit.ajax-form').on('submit.ajax-form', function (e) {
                    console.log("SUBMIT");
                    $('.popup-error').css('display','none').html('');
                    //e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (res) {
                            console.log("AJAX_TRUE");
                            if (res.error === true) {
                                console.log("ERROR");
                                $('.popup-error').css('display','block').html('<p>' + res["message"] + '</p>');
                            } else {
                                console.log("NO ERROR");
                                let result = '<section class="popup popup-request-call popup--active arcticmodal-overlay"> <div class="popup-successful__inner">' +
                                    '<h2 class="popup-successful__title section-title">Заявка отправлена</h2>' +
                                    '<div class="popup-successful__message">Менеджер свяжется с вами в ближайшее время. </div> <button class="popup-successful__close popup__close js-init-form-close"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M20 0.908974L19.091 0L10 9.09103L0.908974 0L0 0.908974L9.09103 10L0 19.091L0.908974 20L10 10.909L19.091 20L20 19.091L10.909 10L20 0.908974Z" fill="#D7825D"></path> </svg></button></div>';
                                $.arcticmodal({
                                    content: result
                                });
                            }
                        }
                    });
                    return false;
                });
            </script>-->

            <!--<script type="text/javascript">
                <?/*
                if (strlen($arResult["LAST_LOGIN"])>0)
                {
                */?>
                try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
                <?/*
                }
                else
                {
                */?>
                try{document.form_auth.USER_LOGIN.focus();}catch(e){}
                <?/*
                }
                */?>
            </script>-->

            <?/*
            if (strlen($_POST['ajax_key']) && $_POST['ajax_key'] == "123") {
                $APPLICATION->RestartBuffer();
                if (!defined('PUBLIC_AJAX_MODE')) {
                    define('PUBLIC_AJAX_MODE', true);
                }
                header('Content-type: application/json');
                if ($arResult['ERROR']) {
                    echo json_encode(array(
                        'type' => 'error',
                        'message' => strip_tags($arResult['ERROR_MESSAGE']['MESSAGE']),
                    ));
                } else {
                    echo json_encode(array('type' => 'ok'));
                }
                require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');
                die();
            }
            */?>

        </form>
    </div>
</section>




<!--
<section class="modal-window" id="auth-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?/*=SITE_TEMPLATE_PATH*/?>/frontend/img/icon-close.svg">
            </a>
        </div>

        <?/*
        if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
            ShowMessage($arResult['ERROR_MESSAGE']);
        */?>

        <div class="modal-window__title">
            <h2 class="title-red-line">Войти<br>в личный кабинет</h2>
        </div>
        <form name="system_auth_form<?/*=$arResult["RND"]*/?>"
              method="post" action="<?/*=$arResult["AUTH_URL"]*/?>"
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
-->