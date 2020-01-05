<?php
/**
 * @author Danil Syromolotov
 */
/**
 * @var CBitrixComponent $component
 * @var CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (isset($_REQUEST['web_form_submit']) && $_REQUEST['web_form_submit'] == 'Y' || isset($_REQUEST['formresult'])) {
    $APPLICATION->RestartBuffer();
    if ($arResult['FORM_ERRORS']) {
        $arResponse = array(
            'error' => true,
            'result' => false,
            'message' => $arResult['FORM_ERRORS']
        );
    } else {
        $arResponse = array(
            'result' => true
        );
    }
    echo json_encode($arResponse);
    die();
} else { ?>
    <?if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') {?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        <?}?>
    <section class="pick-up-oil" id="pick-up-oil">
        <div class="my-container">
            <div class="pick-up-oil__title question__title title-red-line">
                <h2>Задайте вопрос</h2>
            </div>
            <div class="questions__form_container">
                <form class="questions__form">
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>Ваше имя</legend>
                            <input type="text" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item">
                            <legend>E-MAIL</legend>
                            <input type="email" class="main-footer__mailing-input standard-paragraph">
                        </fieldset>
                    </div>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item questions__form-textarea">
                            <legend>Вопрос</legend>
                            <textarea rows="4" class="main-footer__mailing-input standard-paragraph"></textarea>
                        </fieldset>
                    </div>

                    <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y' && $i == count($arResult["arAnswers"])) { ?>
                        <div class="g-recaptcha" data-sitekey="<?=RE_SITE_KEY?>"></div>
                        <div id="g-recaptcha"></div>
                    <? } ?>

                    <div class="filter__checkbox personal-policy">
                        <label>
                            <input class="filter__checkbox-input" type="checkbox">
                            <p class="filter__checkbox-input-p">
                                Я согласен с <a href="#" class="element__questions-author-p_red">
                                    Политикой обработки персональных данных</a>
                            </p>
                        </label>
                    </div>
                    <button type="submit" class="question__form_button standard-paragraph">Задать вопрос</button>
                </form>
            </div>
        </div>
    </section>

    <?if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') {?>
    <script>
        var onloadCallback = function() {
            grecaptcha.render('g-recaptcha', {
                'sitekey' : '<?=RE_SITE_KEY?>'
            });
        };
    </script>
        <?}?>
<? } ?>
