<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>

<?
global $USER;

$authUser = CUser::GetByID($USER->GetParam('USER_ID'));
$userFields = $authUser->arResult[0];

//dump($userFields);
?>

    <section class="profile container">
        <div class="row">
            <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
        </div>
        <div class="catalog__title catalog-el__title title-red-line">
            <h2>профиль</h2>
        </div>
        <div class="profile__title">Мои данные</div>

        <div class="modal__errors">
        </div>

        <form class="profile__form">
            <input type="hidden" name="data-change" value="Y"/>
            <div class="profile__item row">
                <div class="col-12 col-md-6">
                    <fieldset class="q__form-item">
                        <legend>ваше имя</legend>
                        <input type="text" class="inp" name="name" id="name" value="<?= $userFields["NAME"] ?>">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend>Номер телефона</legend>
                        <input type="tel" class="inp" name="phone" id="phone" value="<?= $userFields["PERSONAL_PHONE"] ?>">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend>компания</legend>
                        <input type="text" class="inp" name="company" id="company" value="<?= $userFields["WORK_COMPANY"] ?>">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend>адрес сайта</legend>
                        <input type="text" class="inp" name="website" id="website" value="<?= $userFields["WORK_WWW"] ?>">
                    </fieldset>
                </div>
                <div class="col-12 col-md-6">
                    <fieldset class="q__form-item">
                        <legend>фамилия</legend>
                        <input type="text" class="inp" name="last-name" id="last-name" value="<?= $userFields["LAST_NAME"] ?>">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend>e-mail</legend>
                        <input type="email" class="inp" name="email" id="email" value="<?= $userFields["EMAIL"] ?>">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend>город</legend>
                        <input type="text" class="inp" name="city" id="city" value="<?= $userFields["PERSONAL_CITY"] ?>">
                    </fieldset>
                    <button type="submit" class="profile__btn btn btn_fill">сохранить</button>
                </div>
            </div>
        </form>
        <div class="profile__title">Изменение пароля</div>
        <form class="profile__form">
            <input type="hidden" name="pass-change" value="Y"/>
            <div class="profile__item row">
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend>введите новый пароль</legend>
                            <input type="password" class="inp" name="password" id="password">
                        </fieldset>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend>повторите пароль</legend>
                            <input type="password" class="inp" name="re-password" id="re-password">
                        </fieldset>
                    </div>
                    <button type="submit" class="profile__btn btn btn_fill">изменить пароль</button>
                </div>
            </div>
        </form>
        </div>
    </section>
<?
$APPLICATION->IncludeFile(
    "views/callback.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php",
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>