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
            if ($arResult["TYPE"] == "OK") {
                $json['success'] = 'На указанный email было отправлено письмо, пожалуйста проверьте Вашу почту.';
            }
        } else {
            $json['error']['warning'] = 'Введенный email не найден.';
        }
    } else {
        $json['error'] = $error;
    }
} elseif ($arData['show_form'] == 'Y') {
    ?>

    <section class="modal-window" id="forgot-pass-form">
        <div class="modal-window__close">
            <button class="js-init-modal__close"><?= GetContentSvgIcon('icon-close') ?></button>
        </div>
        <div class="forgot__title">
            <h2 class="title-red-line">восстановление пароля</h2>
        </div>

        <div class="modal__errors">
        </div>

        <form name="forgot-form__form">
            <input name="forgot" value="Y" type="hidden">
            <fieldset class="q__form-item">
                <legend>E-MAIL</legend>
                <input type="email" name="email" id="email" class="inp">
            </fieldset>
            <div class="forgot-pass__desc">
                инструкция по восстановлению пароля будет отправлена на ваш e-mail
            </div>
            <button type="submit" class="auth-form__button btn btn_fill js-init-forgot_send">восстановить пароль
            </button>
        </form>
    </section>
<? } ?>
<? if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
} ?>
