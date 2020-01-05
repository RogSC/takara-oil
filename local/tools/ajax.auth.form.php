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
            $error["captcha"] = 'Проверка не пройдена';
        } else {
            $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
            $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

            if (!$resp->isSuccess()){
                foreach ($resp->getErrorCodes() as $code) {
                    $error["captcha"] = $code;
                    return;
                }
            }
        }

    if (strlen($arData['login']) <= 0) {
        $error['login'] = 'Укажите Ваш email';
    } elseif (urldecode($arData['login']) != 'admin') {
        if (!check_email(urldecode($arData['login']))) {
            $error['login'] = Loc::getMessage('ERROR_INCORRECT_EMAIL');
        }
    }
    if (strlen($arData['pass']) <= 0) {
        $error['pass'] = 'Поле обязательно для заполнения';
    } else {
        $filter = array("ACTIVE" => "Y", "LOGIN" => urldecode($arData['login']));
        $rsUsers = $us->GetList($by = "NAME", $order = "desc", $filter);
        while ($ar_res = $rsUsers->Fetch()) {
            $arUser = $ar_res;
        }
        if (intval($arUser['ID']) > 0) {
            if (!isUserPassword($arUser['ID'], $arData['pass'])) {
                $error['pass'] = 'Неверный пароль';
            }
        }
    }
    if (!$error) {
        $user = CUser::GetList($by, $order, array('EMAIL' => urldecode($arData['login'])), array())->Fetch();
        if ($user['EMAIL']) {
            $arAuthResult = $USER->Login($user['LOGIN'], $arData['pass'], "Y");
            if (!is_array($arAuthResult) && $arAuthResult == true) {
                $json['success'] = 'Вы успешно авторизованны! Через несколько секунд Вы будете перенаправлены в Личный кабинет.';
            } else {
                $json['error'] =  'Неверный логин или пароль';
            }
            $json['result'] = $arAuthResult;
        } else {
            $json['error'] =  'Неверный логин или пароль';
        }

    } else {
        $json['error'] = $error;
    }
} elseif (isset($arData['show_form']) && $arData['show_form'] == 'Y') {
?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <section class="modal-window_">
        <div class="modal-window__container">
            <div class="modal-window__close">
                <button class="js-init-modal_close"><?=GetContentSvgIcon('icon-close')?></button>
            </div>
            <div class="modal-window__title">
                <h2 class="title-red-line">Войти<br>в личный кабинет</h2>
            </div>

            <form name="auth-form__form" method="post" action>
                <input type="hidden" name="authorize" value="Y"/>
                <?= bitrix_sessid_post() ?>
                <div class="form-group">
                    <div class="form-group__item">
                        <label for="login">E-MAIL</label>
                        <input type="email" class="inp" name="login" id="login">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group__item">
                        <label for="pass">Пароль</label>
                        <input type="password" class="inp" name="pass" id="pass">
                    </div>
                </div>

                <div class="g-recaptcha" data-sitekey="<?=RE_SITE_KEY?>"></div>
                <div id="g-recaptcha"></div>


                <button type="submit" class="auth-form__button standard-paragraph">Войти</button>

                <div class="auth-form__forgot-pass">
                    <span class="standard-paragraph js-init-forgot_form">забыли пароль?</span>
                </div>

                <div class="modal-window_sep">
                    <span>ИЛИ</span>
                </div>

                <a href="<?=SITE_DIR?>registration/">
                    <div class="auth-form__button_reg standard-paragraph">
                        зарегистрироваться
                    </div>
                </a>
            </form>
        </div>
    </section>
    <script>
        var onloadCallback = function() {
            grecaptcha.render('g-recaptcha', {
                'sitekey' : '<?=RE_SITE_KEY?>'
            });
        };
    </script>
    <style>
        .modal-window_sep {
            position:relative;
            display: flex;
            justify-content: center;
        }
        .modal-window_sep:before {
            position: absolute;
            display: block;
            content: '';
            width: 100%;
            height: 4px;
            color: #ccc;
            top:calc(50% - 2px);

        }
        .modal-window_sep span {
            display: inline-block;
            padding: 2px 10px;
            background: #000;
        }
    </style>
<?}
if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
}
?>
