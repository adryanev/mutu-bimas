<?php
/**
 * @var $this View
 * @var $response
 * @var $institusi app\models\Institusi
 */

use app\helpers\NomorKriteriaHelper;
use app\models\Constants;
use yii\web\View;

$controller = $this->context->id;

$modelNarasi = $response->modelNarasi;
$item = $response->item;
$model = $response->model;
$kriteria = $response->kriteria;
$path = $response->path;
$detailCollection = \yii2mod\collection\Collection::make($response->detailCollection);
$modelAttribute = $response->modelAttribute;
$prodi = $response->prodi;
$untuk = $response->untuk;
$poin = $response->poin;
?>

<div class="led-content">
    <?php if (!empty($item->butir)):
        foreach ($item->butir as $butir):
            $modelAttribute = NomorKriteriaHelper::changeToDbFormat($butir->nomor);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <?= nl2br($butir->deskripsi) ?>
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
        <?php
        endforeach;
    else: ?>

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
    <?php endif; ?>
    <div class="kt-separator"></div>


    <?= $this->render('_item_dokumen', [

        'model' => $model,
        'kriteria' => $kriteria,
        'prodi' => $prodi,
        'path' => $path,
        'json_dokumen' => $item->dokumen_sumber,
        'jenis' => Constants::SUMBER,
        'detailCollection' => $detailCollection,
        'untuk' => $untuk,
        'institusi'=>$institusi
    ]) ?>

    <?= $this->render('_item_dokumen', [
        'model' => $model,
        'kriteria' => $kriteria,
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
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>

            </th>
        </tr>
        </thead>

        <tbody>
        <?php
        $detail = $detailCollection->where('jenis_dokumen', Constants::LAINNYA)->where('kode_dokumen',
            $poin)->values()->all();

        foreach ($detail as $k => $v):
            ?>

            <?= $this->render('_item_dokumen_detail', [
            'path' => $path,
            'kriteria' => $kriteria,
            'jenis' => Constants::LAINNYA,
            'detail' => $v,
            'nomor' => $k + 1,
            'prodi' => $prodi,
            'untuk' => $untuk,
            'model' => $model,
            'institusi'=>$institusi

        ]) ?>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
