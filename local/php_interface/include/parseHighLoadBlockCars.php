<?php
// подключаем пространство имен класса HighloadBlockTable и даём ему псевдоним
// HLBT для удобной работы
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
// id highload-инфоблока
const MY_HL_BLOCK_ID = 1;
//подключаем модуль highloadblock
CModule::IncludeModule('highloadblock');
//Напишем функцию получения экземпляра класса:
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);
$cars = array();

$rsData = $entity_data_class::getList(array(
    'select' => array('*')
));

while($el = $rsData->fetch()){
    $cars[$el["UF_BRAND"]][$el["UF_MODEL"]][] = $el["UF_ENGINE"];

    /*if(!in_array($el["UF_BRAND"], $cars)) {
        $cars[] = $el["UF_BRAND"];
    }
    if(!in_array($el["UF_MODEL"], $cars[$el["UF_BRAND"]])) {
        $cars[$el["UF_BRAND"]][] = $el["UF_MODEL"];
    }
    $cars[$el["UF_BRAND"]][$el["UF_MODEL"]][] = $el["UF_ENGINE"];*/
}
global $cars;
$GLOBALS['cars'] = $cars;
//dump($GLOBALS['cars']);
//header('Content-type: application/json');
/*if (isset($_POST["pick-up-car"])) {
	echo json_encode(array('success' => 1));
} else {
	echo json_encode(array('success' => 0));
}
Bitrix\Main\Web\Json::encode(array('success' => 0));*/
?>