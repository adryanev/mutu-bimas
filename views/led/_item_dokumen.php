<?php
/**
 * @var $this yii\web\View
 * @var $jenis string
 * @var $json_dokumen
 * @var $kriteria
 * @var $path string
 * @var $model
 * @var $prodi
 * @var $detailCollection yii2mod\collection\Collection
 */

use common\models\Constants;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;

$controller = $this->context->id;
$attr = 'dokumen_' . $jenis
?>
<!--                            Tabel dokumen sumber-->
<table class="table table-striped table-hover">
    <thead class="thead-light">
    <tr>
        <th colspan="3" class="text-center">Dokumen <?= ucfirst($jenis) ?></th>
    </tr>
    </thead>
    <thead class="thead-dark">
    <tr>
        <th>Kode</th>
        <th colspan="2">Nama Dokumen</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (!empty($json_dokumen)):
        foreach ($json_dokumen as $keyDok => $dok):
            $dokAttr = \app\helpers\NomorKriteriaHelper::changeToDbFormat($dok->kode);
            ?>
            <tr>
                <th scope="row">
                    <?= $dok->kode ?>
                </th>
                <td>
                    <?= $dok->dokumen ?>
                </td>
                <td>
                    <div class="row pull-right">
                        <div class="col-lg-12">
                        </div>
                    </div>

                </td>
            </tr>
            <?php

            $detail = $detailCollection->where('jenis_dokumen', $jenis)->where('kode_dokumen',
                $dok->kode)->values()->all();

            foreach ($detail as $k => $v):
                ?>
                <?= $this->render('_item_dokumen_detail', [
                'path' => $path,
                'kriteria' => $kriteria,
                'jenis' => $jenis,
                'detail' => $v,
                'nomor' => $k + 1,
                'prodi' => $prodi,
                'untuk' => $untuk,
                'model' => $model,
                'institusi'=>$institusi
            ]) ?>

            <?php endforeach; ?>
        <?php endforeach;
    else:
        ?>
        <tr>
            <td colspan="3">Tidak ada dokumen</td>
        </tr>
    <?php
    endif; ?>


    </tbody>
</table>
