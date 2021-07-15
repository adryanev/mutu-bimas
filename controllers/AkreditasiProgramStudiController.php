<?php


namespace app\controllers;


use app\models\Aplikasi;
use app\models\Institusi;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\web\Controller;
use yii2mod\collection\Collection;

class AkreditasiProgramStudiController extends BaseApiController
{


    public function actionIndex(){
        $aplikasi = Aplikasi::find()->all();

        $response = [];
        foreach ($aplikasi as $app){
            $items = $this->fetchAkreditasi($app,'index')->data->items;
            $responseObj = new \stdClass();
            $responseObj->items = $items;
            $responseObj->institusi = $app->institusi;
            $response[] = $responseObj;
        }
        $collection = Collection::make($response);
        return $this->render('index',compact('collection'));
    }

    public function actionView($institusi, $akreditasi){

        $modelInstitusi = Institusi::findOne($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = new \stdClass();
        $r =  $this->client->createRequest()->setMethod('GET')->setUrl($aplikasi->endpoint."/akreditasi-prodi/detail")
        ->setData(['id'=>$akreditasi])->send();
        $response->items = $r->data;
        $response->akreditasi = $this->fetchAkreditasi($aplikasi,'view',['id'=>$akreditasi])->data;
        $response->institusi = $modelInstitusi;
        return $this->render('view',compact('response'));
    }
    /**
     * @param Aplikasi $aplikasi
     * @return \yii\httpclient\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    protected function fetchAkreditasi(Aplikasi $aplikasi,$action,$params = []){
        $data = ArrayHelper::merge($params,['expand'=>'k9LedProdi,k9LkProdi,prodi,akreditasi,kuantitatif']);
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl($aplikasi->endpoint."/akreditasi-prodi/".$action)
            ->setData($data)
            ->send()
        ;
        return $response;
    }

}
