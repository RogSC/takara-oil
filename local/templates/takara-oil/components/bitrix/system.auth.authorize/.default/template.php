<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<section class="modal-window" id="auth-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line">Войти<br>в личный кабинет</h2>
        </div>

<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>

<form name="form_auth" method="post" id="auth-form__form"
      onsubmit="formValid()"
      action="<?=$arResult["AUTH_URL"]?>">
    <input type="hidden" name="AUTH_FORM" value="Y" />
    <input type="hidden" name="TYPE" value="AUTH" />
    <?if (strlen($arResult["BACKURL"]) > 0):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?endif?>
    <?
    foreach ($arResult["POST"] as $key => $value)
    {
        ?>
        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
        <?
    }
    ?>
    <div class="questions__form-item-container">
        <fieldset class="questions__form-item">
            <legend>E-MAIL</legend>
            <input class="main-footer__mailing-input standard-paragraph"
                   type="text"
                   name="USER_LOGIN"
                   maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" size="17">
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
                   autocomplete="off">
        </fieldset>
    </div>
<?/*if($arResult["SECURE_AUTH"]):*/?><!--
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?/*echo GetMessage("AUTH_SECURE_NOTE")*/?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?/*echo GetMessage("AUTH_NONSECURE_NOTE")*/?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
--><?/*endif*/?>
    <div class="g-recaptcha" data-sitekey="6LdHWsgUAAAAAFhSOjmgy6GWAC3cyIybNXsmtvX8"></div>

    <button type="submit" name="Login" class="auth-form__button standard-paragraph">Войти</button>
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

<?/*
if ($arParams["NOT_SHOW_LINKS"] != "Y"):*/?><!--
<noindex>
<div class="field">
<a href="<?/*=$arResult["AUTH_FORGOT_PASSWORD_URL"]*/?>" rel="nofollow"><b><?/*=GetMessage("AUTH_FORGOT_PASSWORD_2")*/?></b></a><br />
<?/*=GetMessage("AUTH_GO")*/?> <a href="<?/*=$arResult["AUTH_FORGOT_PASSWORD_URL"]*/?>" rel="nofollow"><?/*=GetMessage("AUTH_GO_AUTH_FORM")*/?></a><br />
<?/*=GetMessage("AUTH_MESS_1")*/?> <a href="<?/*=$arResult["AUTH_CHANGE_PASSWORD_URL"]*/?>" rel="nofollow"><?/*=GetMessage("AUTH_CHANGE_FORM")*/?></a>
</div>
</noindex>
<?/*endif*/?>
</form>
<script type="text/javascript">
<?/*if (strlen($arResult["LAST_LOGIN"])>0):*/?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?/*else:*/?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?/*endif*/?>
</script>-->

</div>

<?/*if($arResult["AUTH_SERVICES"]):*/?><!--
<?/*
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "", 
	array(
		"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
		"CURRENT_SERVICE"=>$arResult["CURRENT_SERVICE"],
		"AUTH_URL"=>$arResult["AUTH_URL"],
		"POST"=>$arResult["POST"],
	), 
	$component, 
	array("HIDE_ICONS"=>"Y")
);
*/?>
--><?/*endif*/?>
</section>

<!--<script>
    $(document).on('ready', function(){
        $('#auth-form__form').submit(function(){
            return false;
            var $this = $(this);
            var $form = {
                action: $this.attr('action'),
                post: {'ajax_key':'<?/*= md5('ajax_'.'LICENSE_KEY')*/?>'}
            };
            console.log($form['post']);
            $.each($('input', $this), function(){
                if ($(this).attr('name').length) {
                    $form.post[$(this).attr('name')] = $(this).val();
                    console.log($(this).val());
                }
            });
            $.post($form.action, $form.post, function(data){
                $('input', $this).removeAttr('disabled');
                if (data.type === 'error') {
                    alert(data.message);
                } else {
                    window.location = window.location;
                }
            }, 'json');
            return false;
        });
    });
</script>-->

<?
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
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
    die();
}
?>