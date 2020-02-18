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
if ($arData['change_new_password'] == 'Y') {
    if (strlen($arData['USER_LOGIN']) <= 0) {
        //$error['login'] = Loc::getMessage('ERROR');
    } else {
        $LOGIN = urldecode($arData['USER_LOGIN']);
    }
    if (strlen($arData['USER_CHECKWORD']) <= 0) {
        //$error['checkword'] = Loc::getMessage('ERROR');
    } else {
        $CHECKWORD = $arData['USER_CHECKWORD'];
    }
    if (strlen($arData['password']) <= 0) {
        $error['password'] = Loc::getMessage('ERROR_EMPTY_PASS');
    } elseif (strlen($arData['password']) < 6) {
        $error['password'] = Loc::getMessage('ERROR_PASS_LENGTH');
    } else {
        $PASSWORD = urldecode($arData['password']);
    }
    if (strlen($arData['re-password']) <= 0) {
        $error['re-password'] = Loc::getMessage('ERROR_EMPTY_RE_PASS');
    } elseif ($PASSWORD != urldecode($arData['re-password'])) {
        $error['re-password'] = Loc::getMessage('ERROR_PASS_NOT_MATCH');
    } else {
        $CONFIRM_PASSWORD = $arData['re-password'];
    }
    if (!$error) {
        $forgotResult = $us->ChangePassword($LOGIN, $CHECKWORD, $PASSWORD, $CONFIRM_PASSWORD);
        if ($forgotResult['TYPE'] != "ERROR") {
            $json['success'] = $forgotResult['MESSAGE'];
        } else {
            $json['error']['forgot'] = $forgotResult['MESSAGE'];
        }
    } else {
        $json['error'] = $error;
    }
} elseif (isset($arData['change_password']) && $arData['change_password'] == 'yes') { ?>
    <section class="modal-window js-init-forgot-modal">
        <div class="modal-window__close">
            <button class="js-init-modal__close"><?= GetContentSvgIcon('icon-close') ?></button>
        </div>
        <div class="auth__title">
            <h2 class="title-red-line"><?= Loc::getMessage('FORGOT_PASS_TITLE') ?></h2>
        </div>
        <form class="forgot-password" action="<?= POST_FORM_ACTION_URI ?>" >
            <?= bitrix_sessid_post() ?>
            <input type="hidden" name="change_new_password" value="Y"/>
            <div class="profile__item row">
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend><?= Loc::getMessage('NEW_PASS') ?></legend>
                            <input type="password" class="inp" name="password" id="password">
                        </fieldset>
                    </div>
                    <div class="modal__errors col-12" id="callback__errors"></div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend><?= Loc::getMessage('RE_PASS') ?></legend>
                            <input type="password" class="inp" name="re-password" id="re-password">
                        </fieldset>
                    </div>
                    <button type="submit" class="profile__btn btn btn_fill">
                        <?= Loc::getMessage('CHANGE_PASS') ?>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <?
}
if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
}
?>