<?php
/**
 * @var $this View
 * @var $response
 * @var $institusi app\models\Institusi
 */

use app\models\Constants;

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use yii\web\View;

$controller = $this->context->id;
$item = $response->item;
$modelNarasi = $response->modelNarasi;
$path = $response->path;
$modelAttribute = $response->modelAttribute;
$prodi = $response->prodi;
$detailCollection = \yii2mod\collection\Collection::make($response->detailCollection);
$model=$response->model;
$poin = $response->poin;
$untuk = $response->untuk;
?>

<div class="led-content">
    <div class="row">
        <div class="col-lg-12">
            <?= nl2br($item->deskripsi) ?>
        </div>
    </div>
    <br>
    <div class="clearfix"></div>


    <div class="row">
        <div class="col-lg-12">


                <div class="card bg-light p-3">
                    <div class="card-body">
                        <?= $modelNarasi->$modelAttribute ?>
                    </div>
                </div>

        </div>
    </div>
    <div class="kt-separator"></div>


    <?= $this->render('_item_dokumen_non_kriteria', [

        'prodi' => $prodi,
        'path' => $path,
        'json_dokumen' => $item->dokumen_sumber,
        'jenis' => Constants::SUMBER,
        'detailCollection' => $detailCollection,
        'untuk' => $untuk,
        'institusi'=>$institusi,
        'poin'=>$poin,
        'model'=>$model
    ]) ?>

    <?= $this->render('_item_dokumen_non_kriteria', [
        'model' => $model,
        'poin' => $poin,
        'prodi' => $prodi,
        'path' => $path,
        'json_dokumen' => $item->dokumen_pendukung,
        'jenis' => Constants::PENDUKUNG,
        'detailCollection' => $detailCollection,
        'untuk' => $untuk,
        'institusi'=>$institusi

    ]) ?>


    <!--                            Tabel dokumen Lainnya-->
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th colspan="3" class="text-center">Dokumen Lainnya</th>
        </tr>
        </thead>
        <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Dokumen Lainnya</th>
            <th>
            </th>
        </tr>
        </thead>

        <tbody>
        <?php
        $detail = $detailCollection->where('jenis_dokumen', Constants::LAINNYA)->where('kode_dokumen',
            $poin . '.' . $item->nomor)->values()->all();
        foreach ($detail as $k => $v):
            ?>
            <?= $this->render('_item_dokumen_detail_non_kriteria',
            [
                'path' => $path,
                'poin' => $poin,
                'jenis' => 'lainnya',
                'detail' => $v,
                'nomor' => $k + 1,
                'prodi' => $prodi,
                'led' => $model,
                'untuk' => $untuk,
                'institusi'=>$institusi
            ]) ?>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
