<?php


namespace app\controllers;


class LedController extends BaseApiController
{

    protected $lihatKriteriaView = '@app/views/led/isi-kriteria';
    protected $lihatNonKriteriaView = '@app/views/led/isi-non_kriteria';
    protected $itemLedView = '@app/views/led/_isi_led';
    protected $itemLedNonKriteriaView = '@app/views/led/_isi_led_non_kriteria';

    public function actionLihatKriteria($led, $kriteria, $prodi, $institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','lihat-kriteria',['led'=>$led,'kriteria'=>$kriteria]);
        return $this->render($this->lihatKriteriaView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi
        ]);

    }
    public function actionLihatNonKriteria($led, $poin, $prodi, $institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','lihat-non-kriteria',['led'=>$led,'poin'=>$poin]);
        return $this->render($this->lihatNonKriteriaView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi
        ]);

    }

    public function actionButirItem($led, $kriteria, $poin,$prodi,$untuk,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','butir-item',['led'=>$led,'kriteria'=>$kriteria,
            'poin'=>$poin]);

        return $this->renderAjax($this->itemLedView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi,
        ]);

    }
    public function actionButirItemNonKriteria($led, $nomor, $poin,$prodi,$untuk,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','butir-item-non-kriteria',['led'=>$led,
            'nomor'=>$nomor,
            'poin'=>$poin]);

        return $this->renderAjax($this->itemLedNonKriteriaView,[
            'response'=>$response->data,
            'institusi'=>$modelInstitusi,
        ]);

    }


    public function actionLihatDokumen($id,$kriteria,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','lihat-dokumen',['id'=>$id,'kriteria'=>$kriteria]);

        return $this->renderAjax('//lk/_modal_content',[
            'response'=>$response->data,
        ]);
    }
    public function actionLihatDokumenNonKriteria($id,$poin,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','lihat-dokumen-non-kriteria',['id'=>$id]);
;
        return $this->renderAjax('//lk/_modal_content',[
            'response'=>$response->data,
        ]);
    }

    public function actionDownloadDetail($kriteria,$dokumen,$led,$jenis,$institusi){

        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','download-detail',['dokumen'=>$dokumen,
            'kriteria'=>$kriteria,'led'=>$led,'jenis'=>$jenis]);

        $download = $this->downloadFiles($response->data->path,$response->data->filename);
        return \Yii::$app->response->sendFile($download);
    }
    public function actionDownloadDetailNonKriteria($poin,$dokumen,$led,$jenis,$institusi){

        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','download-detail-non-kriteria',['dokumen'=>$dokumen,
            'poin'=>$poin,'led'=>$led,'jenis'=>$jenis]);

        $download = $this->downloadFiles($response->data->path,$response->data->filename);
        return \Yii::$app->response->sendFile($download);
    }


    public function actionDownloadDokumen($dokumen,$institusi){
        $modelInstitusi = $this->findInstitusi($institusi);
        $aplikasi = $modelInstitusi->aplikasi;

        $response = $this->sendRequest($aplikasi,'led-prodi','download-dokumen',['dokumen'=>$dokumen]);
        $download = $this->downloadFiles($response->data->path,$response->data->filename);

        return \Yii::$app->response->sendFile($download);
    }

}
