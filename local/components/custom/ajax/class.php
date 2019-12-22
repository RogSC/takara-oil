<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once $_SERVER["DOCUMENT_ROOT"]. "/local/php_interface/include/parseHighLoadBlockCars.php";


use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;


class CCustomAjax extends CBitrixComponent implements Controllerable
{
    /**
     * @return array
     */
    public function configureActions()
    {
        return [
            'test' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    new ActionFilter\HttpMethod(
                        array(ActionFilter\HttpMethod::METHOD_GET, ActionFilter\HttpMethod::METHOD_POST)
                    ),
                    new ActionFilter\Csrf(),
                ],
                'postfilters' => []
            ]
        ];
    }

    function executeComponent()
    {
    }


    /**
     * @param string $param2
     * @param string $param1
     * @return array
     */
    public function testAction($param2 = 'qwe', $param1 = '')
    {
        //$ajaxResult = [$cars["Acura"]["CL"] => "1"];
        $ajaxResult = array();
        foreach($cars as $key => $car) {
            $ajaxResult[$key] = $car;
        };
        $ajaxResult[] = "Hi";
        return $cars;
            //$GLOBALS['cars'];
        /*[
            'asd' => $param1,
            'count' => 200
        ];*/
    }

}
?>
