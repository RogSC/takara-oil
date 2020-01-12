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
if ($arData['authorize'] == 'Y') {

    if (strlen($arData['g-recaptcha-response']) == 0) {
        $error["captcha"] = Loc::getMessage('ERROR_RECAPTCHA');
    } else {
        $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
        $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if (!$resp->isSuccess()) {
            foreach ($resp->getErrorCodes() as $code) {
                $error["captcha"] = $code;
                return;
            }
        }
    }

    if (strlen($arData['login']) <= 0) {
        $error['login'] = Loc::getMessage('ERROR_EMPTY_EMAIL');
    } elseif (urldecode($arData['login']) != 'admin') {
        if (!check_email(urldecode($arData['login']))) {
            $error['login'] = Loc::getMessage('ERROR_INCORRECT_EMAIL');
        }
    }
    if (strlen($arData['pass']) <= 0) {
        $error['pass'] = Loc::getMessage('ERROR_EMPTY_PASS');
    } else {
        $filter = array("ACTIVE" => "Y", "LOGIN" => urldecode($arData['login']));
        $rsUsers = $us->GetList($by = "NAME", $order = "desc", $filter);
        while ($ar_res = $rsUsers->Fetch()) {
            $arUser = $ar_res;
        }
    }
    if (!$error) {
        $user = CUser::GetList($by, $order, array('EMAIL' => urldecode($arData['login'])), array())->Fetch();
        if ($user['EMAIL']) {
            $arAuthResult = $USER->Login($user['LOGIN'], $arData['pass'], "Y");
            if (!is_array($arAuthResult) && $arAuthResult == true) {
                $json['success'] = Loc::getMessage('SUCCESS');
            } else {
                $json['error']['auth'] = Loc::getMessage('ERROR_EMAIL_OR_PASS');
            }
            $json['result'] = $arAuthResult;
        } else {
            $json['error']['auth'] = Loc::getMessage('ERROR_EMAIL_OR_PASS');
        }

    } else {
        $json['error'] = $error;
    }
} elseif (isset($arData['show_form']) && $arData['show_form'] == 'Y') {
    ?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
            defer></script>
    <section class="modal-window">
        <div class="modal-window__close">
            <button class="js-init-modal__close"><?= GetContentSvgIcon('icon-close') ?></button>
        </div>
        <div class="auth__title">
            <h2 class="title-red-line"><?= Loc::getMessage('SIGN') ?><br><?= Loc::getMessage('IN_PROFILE') ?></h2>
        </div>

        <div class="modal__errors">
        </div>

        <form name="auth-form__form" method="post" action>
            <input type="hidden" name="authorize" value="Y"/>
            <?= bitrix_sessid_post() ?>
            <fieldset class="q__form-item">
                <legend><?= Loc::getMessage('EMAIL') ?></legend>
                <input type="email" class="inp" name="login" id="login">
            </fieldset>
            <fieldset class="q__form-item">
                <legend><?= Loc::getMessage('PASS') ?></legend>
                <input type="password" class="inp" name="pass" id="pass">
            </fieldset>

            <div class="g-recaptcha-13" data-sitekey="<?= RE_SITE_KEY ?>"></div>
            <div id="g-recaptcha-13" class="g-recaptcha"></div>

            <button type="submit" class="auth-form__button btn btn_fill"><?= Loc::getMessage('SIGN') ?></button>

            <div class="auth-form__forgot-pass">
                <span class="js-init-forgot_form"><?= Loc::getMessage('FORGOT_PASS') ?></span>
            </div>

            <div class="modal-window_sep">
                <span><?= Loc::getMessage('OR') ?></span>
            </div>

            <a href="<?= SITE_DIR ?>registration/" class="auth-form__button_reg btn btn-small">
                <?= Loc::getMessage('REG') ?>
            </a>
        </form>
    </section>
    <script>
        var onloadCallback = function () {
            grecaptcha.render('g-recaptcha-13', {
                'sitekey': '<?=RE_SITE_KEY?>'
            });
        };
    </script>
<?
}
if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
}
?>
