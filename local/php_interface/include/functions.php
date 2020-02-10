<?php
/**
 * Получение кода SVG изображения
 *
 * @param $filename
 * @return bool|false|mixed|string
 */
function GetContentSvgIcon($filename)
{
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/frontend/img/svg/' . $filename . '.svg';
    if (file_exists($iconPath)) {
        return file_get_contents($iconPath);
    }
}

function showPreviewImage($url)
{
    if (!empty($url)) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $url)) {
            return $url;
        }
    }
    return getNoPhoto();
}

function getNoPhoto()
{
    return SITE_TEMPLATE_PATH . '/frontend/img/noPhoto.png';
}

/**
 * Dump переменой, с дополнительной стилизацией
 *
 * @param $var
 */
function dump($var)
{
    echo '<pre style="background:#fff;color:#000;">';
    var_dump($var);
    echo '</pre>';
}

function OnAfterUserRegisterHandler($arFields)
{
    if (intval($arFields["ID"]) > 0)
    {
        $toSend = Array();
        $toSend["EMAIL"] = $arFields["EMAIL"];
        $toSend["USER_ID"] = $arFields["ID"];
        $toSend["USER_IP"] = $arFields["USER_IP"];
        $toSend["USER_HOST"] = $arFields["USER_HOST"];
        $toSend["PERSONAL_PHONE"] = $arFields["PERSONAL_PHONE"];
        $toSend["PERSONAL_CITY"] = $arFields["PERSONAL_CITY"];
        $toSend["WORK_COMPANY"] = $arFields["WORK_COMPANY"];
        $toSend["WORK_WWW"] = $arFields["WORK_WWW"];
        $toSend["NAME"] = (trim ($arFields["NAME"]) == "")? $toSend["NAME"] = htmlspecialchars('<Не указано>'): $arFields["NAME"];
        $toSend["LAST_NAME"] = (trim ($arFields["LAST_NAME"]) == "")? $toSend["LAST_NAME"] = htmlspecialchars('<Не указано>'): $arFields["LAST_NAME"];
        CEvent::SendImmediate ("NEW_USER", SITE_ID, $toSend);
        CEvent::SendImmediate ("USER_INFO", SITE_ID, $toSend);
    }
    return $arFields;
}
