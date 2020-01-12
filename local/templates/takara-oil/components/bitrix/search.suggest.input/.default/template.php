<?php
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<div class="search-result__cont">
    <ul class="search-result__list row"></ul>
</div>
<form class="search-form" action="<?=SITE_DIR?>search/" method="get" id="search">
    <input class="search-form__input inp js-init-fast__search" autocomplete="off" placeholder="<?=Loc::getMessage('SEARCH_PLACEHOLDER_FULL')?>" type="text" name="q" value="" size="40">
    <button type="reset" class="search-form__close"><?=GetContentSvgIcon('icon-close')?></button>
    <button class="search-form__button" title="<?=Loc::getMessage('SEARCH_PLACEHOLDER')?>">
        <?=GetContentSvgIcon('icon-search')?>
    </button>
</form>