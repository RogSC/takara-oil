<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


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
        $carsResult = $GLOBALS['cars'];
        //$ajaxResult = [$cars["Acura"]["CL"] => "1"];
        $ajaxResult = array();
        foreach($carsResult as $key => $car) {
            $ajaxResult[$key] = $car;
        };
        $ajaxResult[] = "Hi";
        return [
            'asd' => $ajaxResult[1],
            'count' => 200
        ];
    }

}
?>
