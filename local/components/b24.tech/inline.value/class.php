<?php
/**
 * @author Danil Syromolotov <ds@itex.ru>
 */

/**
 * Class ItexInlineValue
 */
class ItexInlineValue extends CBitrixComponent
{
    public function executeComponent()
    {
        global $USER;

        if ($USER->IsAuthorized()) {
            //LocalRedirect('/');
            //return false;
        }
        $this->includeComponentTemplate();
    }
}