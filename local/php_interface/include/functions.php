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
