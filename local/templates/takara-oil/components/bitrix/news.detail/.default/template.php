<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$this->setFrameMode(true);
?>
<section class="article container">
    <? if ($arResult["IBLOCK_CODE"] == "articles") { ?>
    <div class="row">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
    </div>
<? } ?>
    <div class="article__container">
        <div class="article-item__container">
            <div class="article__header row">
                <div class="article__header-left col-12 col-md-6">
                    <? if ($arResult["IBLOCK_CODE"] == "promotions") { ?>
                        <div class="promotions__btn-cont">
                            <a href="/promotions/" class="promotions__btn">
                                <?= GetContentSvgIcon('arrow') ?> <?= Loc::getMessage('BACK_TO_PROMOTIONS') ?>
                            </a>
                        </div>
                        <div class="row">
                            <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
                        </div>
                    <? } ?>
                    <div class="<?= $arResult["IBLOCK_CODE"] == "articles" ? 'article__title' : 'promotions__title'?> catalog-element__title title-red-line">
                        <h2><?= $arResult['NAME'] ?></h2>
                    </div>
                    <div class="articles__item_date">
                        <p><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></p>
                    </div>
                </div>
                <div class="article__header-right col-12 col-md-6">
                    <div class="article__logo">
                        <img class="detail_picture"
                             src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                             alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
                             title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
                        />
                    </div>
                </div>
            </div>
            <div class="article__desc">
                <p><?= $arResult['DETAIL_TEXT'] ?></p>
            </div>
            <? if($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'] && count($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE']) > 0) { ?>
            <div class="article__img-list row">
                <div class="big-picture col-12 col-lg-7">
                        <img src="">
                </div>
                <? foreach ($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'] as $arPhoto) { ?>
                <div class="show-pic col-12 col-lg-5">
                    <div class="article__pictures row">
                        <? foreach ($arPhoto as $key => $photo) { ?>
                            <div class="pic-prw col-6">
                                <img class="" src="<?= CFile::GetPath($photo) ?>">
                            </div>
                        <? } ?>
                    </div>
                </div>
                <? } ?>
            </div>
            <div class="article__pag">
                <ul class="pag">
                    <li class="pag__left-arrow pag__arrow"></li>
                    <li class="pag__item pag__item_active">01</li>
                    <li class="pag__item">/</li>
                    <li class="pag__item">
                        <?= strlen(count($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'])) == 1 ? '0' : ''?><?= count($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE']) ?>
                    </li>
                    <li class="pag__right-arrow pag__arrow pag__arrow_active"></li>
                </ul>
            </div>
            <?}?>
            <? if ($arResult["IBLOCK_CODE"] == "articles") { ?>
            <div class="article__desc">
                <p><?= $arResult['PROPERTIES']['ADD_DESC']['VALUE'] ?></p>
            </div>
            <div class="article__video">
                <?= $arResult['PROPERTIES']['VIDEO_LINK']['~VALUE'] ?>
            </div>
            <?}?>
        </div>
    </div>
    <div class="main-page__mouse">
        <?= GetContentSvgIcon('mouse') ?>
    </div>
</section>

<? if ($arResult["IBLOCK_CODE"] == "articles") { ?>
<section class="articles container">
    <div class="main-page__mouse-contain">
    </div>
    <div class="articles__title section__title">
        <h2>Читайте также</h2>
    </div>
    <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"articles", 
	array(
		"COMPONENT_TEMPLATE" => "articles",
		"IBLOCK_TYPE" => "articles",
		"IBLOCK_ID" => "2",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "RAND",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "url",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "200",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SLIDER_TIME" => "5000"
	),
	false
); ?>
    <div class="articles__btn">
        <a href="/articles/">
            <button class="btn btn-small"><?
                $APPLICATION->IncludeFile(
                    "views/articles-link-text.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?></button>
        </a>
    </div>
</section>
<?}?>
