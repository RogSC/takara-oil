<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<section class="modal-window" id="callback-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line"><?
                $APPLICATION->IncludeFile(
                    "views/callback-form-title.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?></h2>
        </div>
        <?if(!empty($arResult["ERROR_MESSAGE"]))
        {
            foreach($arResult["ERROR_MESSAGE"] as $v)
                ShowError($v);
        }
        if(strlen($arResult["OK_MESSAGE"]) > 0)
        {
            ?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
        }
        ?>
        <form name="formCallback" action="<?=POST_FORM_ACTION_URI?>" method="POST">
            <?=bitrix_sessid_post()?>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Имя</legend>
                    <input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Номер телефона</legend>
                    <input type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>E-MAIL</legend>
                    <input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Компания</legend>
                    <input type="text" name="user_company" value="<?=$arResult["AUTHOR_COMPANY"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Город</legend>
                    <input type="text" name="user_city" value="<?=$arResult["AUTHOR_CITY"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item">
                    <legend>Адрес сайта</legend>
                    <input type="text" name="user_site_addr" value="<?=$arResult["AUTHOR_SITE_ADDR"]?>"
                           class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="questions__form-item-container">
                <fieldset class="questions__form-item questions__form-textarea">
                    <legend>Коментарий</legend>
                    <textarea rows="4" name="user_comment" value="<?=$arResult["AUTHOR_COMMENT"]?>"
                              class="main-footer__mailing-input standard-paragraph"></textarea>
                </fieldset>
            </div>

            <div class="g-recaptcha" data-sitekey="6LdHWsgUAAAAAFhSOjmgy6GWAC3cyIybNXsmtvX8"></div>

            <div class="filter__checkbox personal-policy">
                <label>
                    <input class="filter__checkbox-input" type="checkbox">
                    <p class="filter__checkbox-input-p">
                        Я согласен с <a href="#" class="element__questions-author-p_red">
                            Политикой обработки персональных данных</a
                    </p>
                </label>
            </div>
            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
            <button type="submit" name="submit" class="auth-form__button standard-paragraph">Отправить</button>
        </form>
    </div>
</section>




<!--<div class="mfeedback">
<form action="<?/*=POST_FORM_ACTION_URI*/?>" method="POST">
	<?/*if($arParams["USE_CAPTCHA"] == "Y"):*/?>
	<div class="mf-captcha">
		<div class="mf-text"><?/*=GetMessage("MFT_CAPTCHA")*/?></div>
		<input type="hidden" name="captcha_sid" value="<?/*=$arResult["capCode"]*/?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?/*=$arResult["capCode"]*/?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?/*=GetMessage("MFT_CAPTCHA_CODE")*/?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?/*endif;*/?>
	<input type="hidden" name="PARAMS_HASH" value="<?/*=$arResult["PARAMS_HASH"]*/?>">
	<input type="submit" name="submit" value="<?/*=GetMessage("MFT_SUBMIT")*/?>">
</form>
</div>-->