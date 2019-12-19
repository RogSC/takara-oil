<?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	".default", 
	array(
		"USE_CAPTCHA" => "N",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => "rogsc@mail.ru",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "30",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>

<!--<section class="modal-window" id="callback-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?/*=SITE_TEMPLATE_PATH*/?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line">связаться с нами</h2>
        </div>
        <form>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Имя</legend>
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
                    <legend>E-MAIL</legend>
                    <input type="text" class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Компания</legend>
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
                    <legend>Адрес сайта</legend>
                    <input type="text" class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item questions__form-textarea">
                    <legend>Коментарий</legend>
                    <textarea rows="4" class="main-footer__mailing-input standard-paragraph"></textarea>
                </fieldset>
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
            <button type="submit" class="auth-form__button standard-paragraph">Отправить</button>
        </form>
    </div>
</section>-->