<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

    <section class="change-pass">
        <div class="my-container change-pass__container">
            <div class="bread-crumb">
                <p class="bread-crumb-p standard-paragraph">
                    главная — <span class="bread-crumb-p_select">изменение пароля</span>
                </p>
            </div>
            <div class="catalog__title catalog-element__title title-red-line">
                <h2>изменение пароля</h2>
            </div>
            <form>
                <div class="questions__form-items-container change-pass__form-items-container">
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
                    </div>
                    <button type="submit" class="auth-form__button change-pass__button standard-paragraph">Сохранить</button>
                </div>
            </form>


        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>