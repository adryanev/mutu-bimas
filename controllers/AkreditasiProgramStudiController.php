<?php


namespace app\controllers;

use app\models\Aplikasi;
use app\models\Institusi;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\web\Controller;
use yii2mod\collection\Collection;

class AkreditasiProgramStudiController extends BaseApiController
{


    public function actionIndex()
    {
        $institusi = Collection::make(Institusi::find()->all());
        return $this->render('index',compact('institusi'));
    }

    public function actionLoadAkreditasi($id){
        $aplikasi = Aplikasi::findOne(['id_institusi'=>$id]);
        $request =$this->sendRequest($aplikasi, 'akreditasi-prodi', 'index');

        if (!$request->isOk) {
            return  $this->renderAjax('//site/_api-error');
        }
        $items = $request->data->items;
        return $this->renderAjax('_list-akreditasi',['institusi'=>$aplikasi->institusi,'item'=>$items]);
    }

    public function actionView($institusi, $akreditasi)
    {

        $modelInstitusi = Institusi::findOne($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = new \stdClass();
        $r = parent::sendRequest($aplikasi, 'akreditasi-prodi', 'detail', ['id'=>$akreditasi]);

        $response->items = $r->data;
        $response->akreditasi = $this->sendRequest($aplikasi, 'akreditasi-prodi', 'view', ['id'=>$akreditasi])->data;
        $response->institusi = $modelInstitusi;
        return $this->render('view', compact('response'));
    }

    /**
     * @param Aplikasi $aplikasi
     * @return \yii\httpclient\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    protected function sendRequest(Aplikasi $aplikasi, $controller, $action, $params = [])
    {
        $data = ArrayHelper::merge($params, ['expand'=>'k9LedProdi,k9LkProdi,prodi,akreditasi,kuantitatif']);
         $response =  $this->client->createRequest()
            ->addHeaders(['Authorization'=>'Bearer '.$aplikasi->token])
            ->setMethod('GET')
            ->setUrl($aplikasi->endpoint.'/'.$controller.'/'.$action)
            ->setData($data)
            ->send();
        return  $response;
    }
}
