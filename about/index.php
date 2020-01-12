<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О бренде");

use Bitrix\Main\Localization\Loc; ?>

<?
$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => '24'), false, false, array('ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_TEXT'));

while($ob = $res->GetNextElement())
{
    $arResult['FEATURES'][] = $ob->GetFields();
}
?>
    <section class="article container">
        <div class="row">
            <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
        </div>
        <div class="article__container">
            <div class="article-item__container">
                <div class="article__header row">
                    <div class="article__header-left col-12 col-md-6">
                        <div class="article__title catalog-element__title title-red-line">
                            <h2><?= $APPLICATION->sDocTitle ?></h2>
                        </div>
                    </div>
                    <div class="article__header-right col-12 col-md-6">
                        <div class="article__logo">
                            <?
                            $APPLICATION->IncludeFile(
                                "/include/" . SITE_ID . "/about/img.php",
                                array(),
                                array(
                                    "MODE" => "html",
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <? if ($arResult['FEATURES']) { ?>
                    <div class="catalog-el__section catalog-el__features">
                        <div class="catalog-el__section-title">
                            <?= Loc::getMessage('PRODUCT_FEATURES_TITLE') ?>Преимущества:
                        </div>
                        <ul>
                            <? foreach ($arResult['FEATURES'] as $arFeature) { ?>
                                <li class="about__feature">
                                    <img src="<?= CFile::GetPath($arFeature['PREVIEW_PICTURE']) ?>">
                                    <p><?= $arFeature['DETAIL_TEXT'] ?></p>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                <? } ?>
                <div class="article__desc">
                    <p>
                        <?
                        $APPLICATION->IncludeFile(
                            "/include/" . SITE_ID . "/about/desc.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="main-page__mouse">
            <?= GetContentSvgIcon('mouse') ?>
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