
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
        </form>
    </div>
</section>