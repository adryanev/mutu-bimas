<?php
/**
 * @var $this yii\web\View
 * @var $response
 * @var $institusi
 */

$modelAttribute = $response->modelAttribute;
$lkProdi = $response->lkProdi;
$kriteria = $response->kriteria;
$prodi = $response->prodi;
$item = $response->item;
$modelNarasi = $response->modelNarasi;
$path = $response->path;
$untuk = $response->untuk;
$lkCollection = \yii2mod\collection\Collection::make($response->lkCollection);

use app\models\Constants;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

$controller = $this->context->id;
?>
<div class="lk-content">
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'],
                'id' => $modelAttribute . '-form',
                'action' => [
                    $controller . '/isi-kriteria',
                    'lk' => $lkProdi->id,
                    'kriteria' => $kriteria,
                    'prodi' => $prodi->id
                ]
            ]) ?>

            <h5>Tabel <?= $item->tabel ?> <?= $item->nama ?></h5>
            <p><?= $item->petunjuk ?></p>
            <div class="table-responsive">
                <?= $modelNarasi->$modelAttribute ?>
            </div>

            <?php if (!empty($item->keterangan)): ?>
                <h6>Keterangan</h6>
                <?= $item->keterangan ?>
            <?php endif; ?>

            <?php ActiveForm::end() ?>

        </div>
    </div>


    <?= $this->render('_dokumen', [
        'lkProdi' => $lkProdi,
        'prodi' => $prodi,
        'item' => $item,
        'path' => $path,
        'kriteria' => $kriteria,
        'jenis' => Constants::SUMBER,
        'lkCollection' => $lkCollection,
        'untuk' => $untuk,
        'institusi'=>$institusi
    ]) ?>
    <?= $this->render('_dokumen', [
        'lkProdi' => $lkProdi,
        'prodi' => $prodi,
        'item' => $item,
        'path' => $path,
        'kriteria' => $kriteria,
        'jenis' => Constants::PENDUKUNG,
        'lkCollection' => $lkCollection,
        'untuk' => $untuk,
               'institusi'=>$institusi

    ]) ?>

    <!--                                Tabel dokumen lainnya-->
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" class="text-left">Dokumen Lainnya</th>
            <th>
            </th>
        </tr>
        </thead>
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th colspan="2">Dokumen</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $details = $lkCollection->where('jenis_dokumen', Constants::LAINNYA)->where('kode_dokumen',
            $item->tabel)->values()->all();

        if (!empty($details)) :
            foreach ($details as $k => $v) :?>
                <?= $this->render('_dokumen_item', [
                    'path' => $path,
                    'kriteria' => $kriteria,
                    'v' => $v,
                    'prodi' => $prodi,
                    'lkProdi' => $lkProdi,
                    'jenis' => Constants::LAINNYA,
                    'untuk' => $untuk,
                    'institusi'=>$institusi

                ]) ?>
            <?php
            endforeach;
        else:
            echo '<tr><td>Tidak ada dokumen</td></tr>';
        endif ?>
        </tbody>
    </table>

</div>

