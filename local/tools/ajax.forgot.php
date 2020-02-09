<?
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);
define('LANGUAGE_ID', $_REQUEST['lang']);

if (LANGUAGE_ID == 'en') {
    define('SITE_DIR', '/en/');
} elseif (LANGUAGE_ID == 'ja') {
    define('SITE_DIR', '/jp/');
}

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Loc::loadMessages(__FILE__);

$us = new CUser();

$arData = $_REQUEST;
$json = array();

if ($arData['forgot'] == 'Y') {
    if (strlen($arData['email']) <= 0) {
        $error['email'] = Loc::getMessage('ERROR_EMPTY_EMAIL');
    } elseif (urldecode($arData['email']) != 'admin') {
        if (!check_email(urldecode($arData['email']))) {
            $error['email'] = Loc::getMessage('ERROR_INCORRECT_EMAIL');
        }
    }
    if (!$error) {
        $res = CUser::GetList($by, $error, array('EMAIL' => $arData['email']), array())->Fetch();
        if ($res['LOGIN']) {
            $arResult = $USER->SendPassword($res['LOGIN'], urldecode($arData['email']));
            if ($arResult["TYPE"] == "OK") {
                $json['success'] = Loc::getMessage('SUCCESS');
            }
        } else {
            $json['error']['warning'] = Loc::getMessage('ERROR_EMAIL_NOT_FOUND');
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
            <h2 class="title-red-line"><?= Loc::getMessage('RECOVERY_PASS') ?></h2>
        </div>

        <div class="modal__errors">
        </div>

        <form name="forgot-form__form">
            <input name="forgot" value="Y" type="hidden">
            <fieldset class="q__form-item">
                <legend><?= Loc::getMessage('EMAIL') ?></legend>
                <input type="email" name="email" id="email" class="inp">
            </fieldset>
            <div class="forgot-pass__desc">
                <?= Loc::getMessage('RECOVERY_INSTRUCTION') ?>
            </div>
            <button type="submit" class="auth-form__button btn btn_fill js-init-forgot_send">
                <?= Loc::getMessage('RECOVER_PASS') ?>
            </button>
        </form>
    </section>
<? } ?>
<? if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
} ?>
