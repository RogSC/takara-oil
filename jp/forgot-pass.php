<section class="modal-window" id="forgot-pass-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line">восстановление пароля</h2>
        </div>
        <form>
            <div class="questions__form-item-container forgot-pass__item-container">
                <fieldset class="questions__form-item">
                    <legend>E-MAIL</legend>
                    <input type="text" class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="forgot-pass-description standard-paragraph">
                инструкция по восстановлению пароля будет отправлена на ваш e-mail
            </div>
            <button type="submit" class="auth-form__button standard-paragraph">восстановить пароль</button>
        </form>
    </div>
</section>