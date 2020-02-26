<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

global $USER;

$authUser = CUser::GetByID($USER->GetParam('USER_ID'));
$userFields = $authUser->arResult[0];
?>

    <section class="profile container">
        <div class="row">
            <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
        </div>
        <div class="catalog__title catalog-el__title title-red-line">
            <h2><?= Loc::getMessage('PROFILE_TITLE') ?></h2>
        </div>
        <div class="profile__title"><?= Loc::getMessage('PERSONAL_DATA') ?></div>

        <div class="modal__errors">
        </div>

        <form class="profile__form">
            <input type="hidden" name="data-change" value="Y"/>
            <div class="profile__item row">
                <div class="col-12 col-md-6">
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('NAME') ?></legend>
                        <input type="text" class="inp" name="name" id="name" value="<?= $userFields["NAME"] ?>" disabled="disabled">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('PHONE') ?></legend>
                        <input type="tel" class="inp" name="phone" id="phone" value="<?= substr(trim($userFields["PERSONAL_PHONE"]), 1) ?>" disabled="disabled">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('COMPANY') ?></legend>
                        <input type="text" class="inp" name="company" id="company" value="<?= $userFields["WORK_COMPANY"] ?>" disabled="disabled">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('WEBSITE') ?></legend>
                        <input type="text" class="inp" name="website" id="website" value="<?= $userFields["WORK_WWW"] ?>" disabled="disabled">
                    </fieldset>
                </div>
                <div class="col-12 col-md-6">
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('LAST_NAME') ?></legend>
                        <input type="text" class="inp" name="last-name" id="last-name" value="<?= $userFields["LAST_NAME"] ?>" disabled="disabled">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('EMAIL') ?></legend>
                        <input type="email" class="inp" name="email" id="email" value="<?= $userFields["EMAIL"] ?>" disabled="disabled">
                    </fieldset>
                    <fieldset class="q__form-item">
                        <legend><?= Loc::getMessage('CITY') ?></legend>
                        <input type="text" class="inp" name="city" id="city" value="<?= $userFields["PERSONAL_CITY"] ?>" disabled="disabled">
                    </fieldset>
                    <button class="profile__btn btn btn_fill js-init-change-delail"><?= Loc::getMessage('CHANGE') ?></button>
                    <button type="submit" class="profile__btn btn btn_fill js-init-save-detail" style="display: none"><?= Loc::getMessage('SAVE') ?></button>
                </div>
            </div>
        </form>
        <div class="profile__title"><?= Loc::getMessage('CHANGES_PASS') ?></div>
        <form class="profile__form">
            <input type="hidden" name="pass-change" value="Y"/>
            <div class="profile__item row">
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend><?= Loc::getMessage('NEW_PASS') ?></legend>
                            <input type="password" class="inp" name="password" id="password">
                        </fieldset>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="q__form-item-container">
                        <fieldset class="q__form-item">
                            <legend><?= Loc::getMessage('RE_PASS') ?></legend>
                            <input type="password" class="inp" name="re-password" id="re-password">
                        </fieldset>
                    </div>
                    <button type="submit" class="profile__btn btn btn_fill"><?= Loc::getMessage('CHANGE_PASS') ?></button>
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