<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
        defer></script>

<section class="registration container">
    <div class="row">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
    </div>
    <div class="catalog__title catalog-el__title title-red-line">
        <h2>регистрация на сайте</h2>
    </div>

    <div class="modal__errors">
    </div>

    <form class="registration-form">
        <input type="hidden" name="registration" value="Y">
        <div class="q__items row">
            <div class="q__items-left col-12 col-md-6">
                <fieldset class="q__form-item">
                    <legend>имя и фамилия</legend>
                    <input type="text" class="inp" name="fullname" id="fullname">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>E-MAIL</legend>
                    <input type="email" class="inp" name="email" id="email">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>Город</legend>
                    <input type="text" class="inp" name="city" id="city">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>Пароль</legend>
                    <input type="password" class="inp" name="password" id="password">
                </fieldset>
            </div>
            <div class="q__items-right col-12 col-md-6">
                <fieldset class="q__form-item">
                    <legend>Номер телефона</legend>
                    <input type="tel" class="inp" name="phone" id="phone">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>компания</legend>
                    <input type="text" class="inp" name="company" id="company">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>адрес сайта</legend>
                    <input type="text" class="inp" name="website" id="website">
                </fieldset>
                <fieldset class="q__form-item">
                    <legend>повторите пароль</legend>
                    <input type="password" class="inp" name="re-password" id="re-password">
                </fieldset>
            </div>
        </div>

        <div class="g-recaptcha" data-sitekey="<?= RE_SITE_KEY ?>"></div>
        <div id="g-recaptcha"></div>

        <div class="filter__checkbox personal-policy">
            <label>
                <input class="filter__checkbox-input" type="checkbox" name="agree" id="agree" checked>
                <p class="personal-policy__font">
                    Я согласен с <a href="#" class="red-font">
                        Политикой обработки персональных данных</a>
                </p>
            </label>
        </div>
        <button type="submit" class="registr-btn">зарегистрироваться</button>
        <div class="registration__sign-btn">
            УЖЕ ЕСТЬ АККАУНТ? <a href="#" class="js-init-auth_form">ВОЙДИТЕ</a>
        </div>
    </form>
</section>

<script>
    var onloadCallback = function () {
        grecaptcha.render('g-recaptcha', {
            'sitekey': '<?=RE_SITE_KEY?>'
        });
    };
</script>