<?php


namespace app\controllers;


use common\models\kriteria9\akreditasi\K9AkreditasiProdi;
use yii\base\BaseObject;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

class KuantitatifController extends BaseApiController
{

    public function actionDownloadProdi($id,$institusi)
    {
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'kuantitatif','download-dokumen',['dokumen'=>$id]);
        $download = $this->downloadFiles($response->data->path,$response->data->filename);
        return \Yii::$app->response->sendFile($download);
    }

    public function actionShow($id,$institusi)
    {

        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'kuantitatif','show',['id'=>$id]);

        return $this->renderAjax('//lk/_modal_content',[
            'response'=>$response->data,
        ]);
    }

    public function actionProdi($id,$institusi)
    {

        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'kuantitatif','prodi',['id'=>$id]);
        $dataProvider = new ArrayDataProvider(['allModels'=>$response->data->items]);
        return $this->renderAjax('_list', ['untuk'=>'prodi','dataProvider'=>$dataProvider,'institusi'=>$modelInstitusi]);

    }
}
