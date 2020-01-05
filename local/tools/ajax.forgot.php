<?
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Loc::loadMessages(__FILE__);

$us = new CUser();

$arData = $_REQUEST;
$json = array();

if ($arData['forgot'] == 'Y') {
    if (strlen($arData['email']) <= 0) {
        $error['email'] = 'Укажите Ваш email';
    } elseif (urldecode($arData['email']) != 'admin') {
        if (!check_email(urldecode($arData['email']))) {
            $error['email'] = 'Некорректный email адрес';
        }
    }
    if (!$error) {
        $res = CUser::GetList($by, $error, array('EMAIL' => $arData['email']), array())->Fetch();
        if ($res['LOGIN']) {
            $arResult = $USER->SendPassword($res['LOGIN'], urldecode($arData['email']));
            if($arResult["TYPE"] == "OK") {
                $json['success'] = 'На указанный email было отправлено письмо, пожалуйста проверьте Вашу почту.';
            }
        } else {
            $json['warning'] = 'Введенный email не найден.';
        }
    } else {
        $json['error'] = $error;
    }
} elseif ($arData['show_form'] == 'Y') {
?>

<section class="modal-window_" style="position: relative" id="forgot-pass-form">
    <div class="modal-window__container">
        <div class="modal-window__close">
            <a href="#">
                <img width="20" height="20" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-close.svg">
            </a>
        </div>
        <div class="modal-window__title">
            <h2 class="title-red-line">восстановление пароля</h2>
        </div>
        <form name="forgot-form__form">
            <input name="forgot" value="Y" type="hidden">
            <div class="questions__form-item-container forgot-pass__item-container">
                <fieldset class="questions__form-item">
                    <legend>E-MAIL</legend>
                    <input type="text" name="email" class="main-footer__mailing-input standard-paragraph">
                </fieldset>
            </div>
            <div class="forgot-pass-description standard-paragraph">
                инструкция по восстановлению пароля будет отправлена на ваш e-mail
            </div>
            <button type="submit" class="auth-form__button standard-paragraph js-init-forgot_send">восстановить пароль</button>
        </form>
    </div>
</section>
<?}?>
<?if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
}?>
