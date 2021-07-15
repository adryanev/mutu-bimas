<?php


namespace app\controllers;


use app\helpers\DownloadDokumenTrait;
use yii2mod\collection\Collection;

class LkController extends BaseApiController
{

    protected $lihatLkKriteria = '@app/views/lk/isi-kriteria';
    protected $itemLkView = '@app/views/lk/_item_lk';
    protected $lkView = '@app/views/lk/isi-kriteria';


    public function actionLihatKriteria($lk, $kriteria, $prodi, $institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'lk-prodi','lihat-kriteria',['lk'=>$lk,'kriteria'=>$kriteria]);
        return $this->render($this->lkView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi
        ]);

    }

    public function actionButirItem($lk, $kriteria, $poin,$prodi,$untuk,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'lk-prodi','butir-item',['lk'=>$lk,'kriteria'=>$kriteria,
            'poin'=>$poin]);

        return $this->renderAjax($this->itemLkView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi,
        ]);

    }

    public function actionLihatDokumen($id,$kriteria,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'lk-prodi','lihat-dokumen',['id'=>$id,'kriteria'=>$kriteria]);

        return $this->renderAjax('_modal_content',[
            'response'=>$response->data,
        ]);
    }

    public function actionDownloadDetail($kriteria,$dokumen,$lk,$prodi,$jenis,$institusi){

        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'lk-prodi','download-detail',['dokumen'=>$dokumen,
            'kriteria'=>$kriteria,'lk'=>$lk,'jenis'=>$jenis,'prodi'=>$prodi]);

        $download = $this->downloadFiles($response->data->path,$response->data->filename);
        return \Yii::$app->response->sendFile($download);
    }



}
