<?php
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<form class="search-form" action="<?=SITE_DIR?>search/" method="get">
    <input class="search-form__input standard-paragraph js-init-fast__search" autocomplete="off" placeholder="<?=Loc::getMessage('SEARCH_PLACEHOLDER_FULL')?>" type="text" name="q" value="" size="40">
    <button class="search-form__button" type="submit" title="<?=Loc::getMessage('SEARCH_PLACEHOLDER')?>">
        <?=GetContentSvgIcon('icon-search')?>
    </button>
</form>