<?php
/**
 * Project: kriteria.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 7/26/2019
 * Time: 3:30 PM
 */
namespace app\helpers;



use Yii;

class UrlRule extends \yii\web\UrlRule
{

    public $connectionID = 'db';

    public function init()
    {
        if ($this->name === null) {
            $this->name = __CLASS__;
        }
    }

    public function createUrl($manager, $route, $params)
    {
        $args='?';
        $idx = 0;
        foreach($params as $num=>$val){
            if($num=='id'){
                $val = base64_encode($val);
            }
            $args .= $num . '=' . $val;
            $idx++;
            if($idx!=count($params)) $args .= '&';
        }
        $suffix = Yii::$app->urlManager->suffix;
        if ($args=='?') $args = '';
        return $route .$suffix. $args;
        return false;  // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        $url = $request->getUrl();
        $queryString = parse_url($url);
        if(isset($queryString['query'])){
            $queryString = $queryString['query'];
            $args = [];
            parse_str($queryString, $args);
            $params = [];
            foreach($args as $num=>$val){
                if($num=='id'){
                    $val = base64_decode($val);
                }
                $params[$num]=$val;
            }
            $suffix = Yii::$app->urlManager->suffix;
            $route = str_replace($suffix,'',$pathInfo);
            return [$route,$params];
        }
        return false;  // this rule does not apply
    }
}
