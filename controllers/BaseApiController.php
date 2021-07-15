<?php


namespace app\controllers;


use yii\httpclient\Client;
use yii\web\Controller;

class BaseApiController extends Controller
{
    protected $client;
    public function __construct($id, $module, $config = [], Client $client)
    {
        $this->client = $client;
        parent::__construct($id, $module, $config);
    }
}
