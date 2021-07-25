<?php


namespace app\controllers;

use app\models\Aplikasi;
use app\models\Institusi;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\httpclient\Client;
use yii\httpclient\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BaseApiController extends Controller
{
    protected $client;
    public function __construct($id, $module, $config = [], Client $client)
    {
        $this->client = $client;
        parent::__construct($id, $module, $config);
    }

    /**
     * @param Aplikasi $aplikasi
     * @param $controller
     * @param $actions
     * @param array $params
     * @return \yii\httpclient\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    protected function sendRequest(Aplikasi $aplikasi, $controller, $actions, $params = [])
    {
        $response =  $this->client->createRequest()
            ->addHeaders(['Authorization'=>'Bearer '.$aplikasi->token])
            ->setMethod('GET')
            ->setUrl($aplikasi->endpoint.'/'.$controller.'/'.$actions)
            ->setData($params)
            ->send();

        if (!$response->isOk) {
            throw new Exception('Tidak dapat terhubung ke API Institusi, Silahkan ganti konfigurasi.');
        }
        return  $response;
    }

    protected function findInstitusi($id)
    {
        if ($model = Institusi::findOne($id)) {
            return $model;
        }

        throw new NotFoundHttpException();
    }

    protected function downloadFiles($path, $filename)
    {

        $temp_file = fopen(sys_get_temp_dir()."/$filename", 'wb');

        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        $data =  $client->createRequest()
            ->setMethod('GET')
            ->setUrl($path)
            ->setOutputFile($temp_file)
            ->send();

        return sys_get_temp_dir()."/$filename";
    }
}
