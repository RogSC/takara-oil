<?php
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<form class="search-form" action="<?=SITE_DIR?>search/" method="get" id="search">
    <div class="search-result__cont">
        <div class="search-result__scroll">
            <ul class="search-result__list row"></ul>
        </div>
    </div>
    <input class="search-form__input inp js-init-fast__search" autocomplete="off" placeholder="<?=$arParams['VALUE']?>" type="text" name="q" value="" size="40">
    <button type="reset" class="search-form__close"><?=GetContentSvgIcon('icon-close')?></button>
    <div class="search-form__button" title="<?=Loc::getMessage('SEARCH_PLACEHOLDER')?>">
        <?=GetContentSvgIcon('icon-search')?>
    </div>
</form>