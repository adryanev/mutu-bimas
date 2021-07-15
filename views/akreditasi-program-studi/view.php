<?php
/**
 * @var $this yii\web\View
 * @var $response stdClass
 */

use app\helpers\FileIconHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Progress;


$items = $response->items;
$modelProdi = $items->modelProdi;
$akreditasiProdi = $response->akreditasi;
$ledProdi = $items->ledProdi;
$dokumenLed = $items->dokumenLed;
$urlLed = $items->urlLed;
$kriteriaLed = $items->kriteriaLed;
$json = $items->json;
 $json_eksternal= $items->json_eksternal;
$json_profil= $items->json_profil;
$json_analisis= $items->json_analisis;
$modelEksternal= $items->modelEksternal;
$modelAnalisis= $items->modelAnalisis;
$modelProfil= $items->modelProfil;
$dataDokumen = $items->dataDokumen;
$path = $items->path;
$jsonLk = $items->jsonLk;
$lkProdi = $items->lkProdi;
$kriteriaLk = $items->kriteriaLk;
$this->title = $response->institusi->nama .' - '.$items->modelProdi->nama;
$this->params['breadcrumbs'][] = ['label'=>'Akreditasi Program Studi','url'=>['akreditasi-program-studi/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__body">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light">
                            <?php
                            $initial = '';
                            $prodiName = preg_split('/\s+/', $modelProdi->nama);

                            foreach ($prodiName as $word) {
                                $initial .= $word[0];
                            }

                            echo $initial
                            ?>
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <a href="#" class="kt-widget__username">
                                    <?= $modelProdi->nama ?>
                                    <i class="flaticon2-correct"></i>
                                </a>
                            </div>
                            <div class="kt-widget__subhead">
                                <a href="#"><i class="flaticon2-edit"></i><?= $akreditasiProdi->akreditasi->nama ?></a>
                                <a href="#"><i class="flaticon-calendar"></i><?= $akreditasiProdi->akreditasi->tahun
                                ?></a>
                                <a href="#"><i class="flaticon-buildings"></i><?= $akreditasiProdi->akreditasi->lembaga
                                ?></a>
                            </div>
                            <div class="kt-widget__info">
                                <div class="kt-widget__desc">
                                    Berikut progress pengisian borang oleh Program Studi.
                                </div>
                                <div class="kt-widget__progress">
                                    <div class="kt-widget__text">
                                        Progress
                                    </div>
                                    <?= Progress::widget([
                                        'bars' => [
                                            ['percent' => $akreditasiProdi->progress, 'options' => ['class' => 'kt-bg-success']]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                        <?= $akreditasiProdi->progress ?>%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__bottom">
                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-list-2"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Laporan Evaluasi Diri</span>
                                <span class="kt-widget__value">  <?= Progress::widget([
                                        'bars' => [
                                            [
                                                'percent' => $akreditasiProdi->k9LedProdi->progress,
                                                'options' => ['class' => 'kt-bg-success']
                                            ]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                       <span><?= $akreditasiProdi->k9LedProdi->progress ?>%</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon2-graphic"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Laporan Kinerja</span>
                                <span class="kt-widget__value">  <?= Progress::widget([
                                        'bars' => [
                                            [
                                                'percent' => $akreditasiProdi->k9LkProdi->progress,
                                                'options' => ['class' => 'kt-bg-success']
                                            ]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                       <span><?= $akreditasiProdi->k9LkProdi->progress ?>%</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-doc"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Matriks Kuantitatif</span>
                                <span
                                    class="kt-widget__value"><?= $akreditasiProdi->kuantitatif ? Html::button('<i
                                    class="flaticon2-arrow-down"></i> Download',
                                        [
                                            'class' => 'btn btn-success btn-sm btn-pill btn-elevate btn-elevate-air showModalButton',
                                            'value' => \yii\helpers\Url::to(['/kuantitatif/prodi', 'id' =>
                                            $akreditasiProdi->id,'institusi'=>$response->institusi->id]),
                                            'title' => 'Berkas Kuantitatif Prodi'
                                        ]) : 'Belum' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        <?= $this->render('//led/_dokumen_led', [
            'modelDokumen' => null,
            'dataDokumen' => $dokumenLed,
            'path' => $urlLed,
            'untuk' => 'lihat',
            'prodi' => $modelProdi
        ]) ?>

        <?= $this->render('//led/_tabel_led', [
            'kriteria' => $kriteriaLed,
            'json' => $json,
            'prodi' => $modelProdi,
            'untuk' => 'lihat',
            'led' => $ledProdi,
            'json_eksternal' => $json_eksternal,
            'json_profil' => $json_profil,
            'json_analisis' => $json_analisis,
            'modelEksternal' => $modelEksternal,
            'modelAnalisis' => $modelAnalisis,
            'modelProfil' => $modelProfil,
            'institusi'=>$response->institusi
        ]) ?>

    </div>
</div>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Dokumen Lk
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
            </div>
        </div>

    </div>

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first" style="margin-bottom: 0;">
            <table class="table table-hover table-light table-striped">
                <thead class="thead-light">
                <tr>

                    <th class="text-center">No.</th>
                    <th class="text-center">Dokumen Lk</th>
                    <th class="text-center">Dibuat Tanggal</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">
                        Aksi
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataDokumen as $key => $item) : ?>
                    <tr>
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?= FileIconHelper::getIconByExtension($item->bentuk_dokumen) ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?= Html::encode($item->nama_dokumen) ?>

                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= Yii::$app->formatter->asDatetime($item->updated_at) ?></td>
                        <td class="text-center"><?= $item->kode_dokumen ?></td>
                        <td>
                            <div class="row pull-right">
                                <div class="col-lg-12">
                                    <?php Modal::begin([
                                        'title' => $item->nama_dokumen,
                                        'toggleButton' => [
                                            'label' => '<i class="la la-eye"></i> &nbsp;Lihat',
                                            'class' => 'btn btn-info btn-pill btn-elevate btn-elevate-air'
                                        ],
                                        'size' => 'modal-lg',
                                        'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                    ]); ?>
                                    <?php if (\app\helpers\FileTypeHelper::getType($item->bentuk_dokumen) === \app\helpers\FileTypeHelper::TYPE_IMAGE):
                                        echo Html::img("$path/{$item->nama_dokumen}",
                                            ['height' => '100%', 'width' => '100%']);
                                    else :?>
                                        <p><small>Jika dokumen tidak tampil, silahkan klik <?= Html::a('di sini.',
                                                    'https://docs.google.com/gview?url=' . $path . '/' . rawurlencode($item->nama_dokumen),
                                                    ['target' => '_blank']) ?></small>
                                        </p> <?php echo ' <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://docs.google.com/gview?url=' . $path . '/' . rawurlencode($item->nama_dokumen) . '&embedded=true"></iframe></div>'; ?>
                                    <?php endif; ?>
                                    <?php Modal::end(); ?>
                                    <?= Html::a('<i class ="la la-download"></i> Unduh',
                                        ['lk' . '/download-dokumen', 'dokumen' => $item->id],
                                        ['class' => 'btn btn-warning btn-pill btn-elevate btn-elevate-air']) ?>
                                </div>

                            </div>


                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Laporan Kinerja Program Studi
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <strong>Perkembangan Pengisian &nbsp;: <?= $lkProdi->progress ?> %</strong>
                        <div class="kt-space-10"></div>
                        <?=
                        Progress::widget([
                            'percent' => $lkProdi->progress,
                            'barOptions' => ['class' => 'progress-bar-info m-progress-lg'],
                            'options' => ['class' => 'progress-sm']
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Kriteria Akreditasi</th>
                            <th style="width: 110px"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($jsonLk as
                                       $kriteriaJson):
                            $prorgess =( $kriteriaLk[$kriteriaJson->kriteria - 1]->progress_narasi +
                                    $kriteriaLk[$kriteriaJson->kriteria - 1]->progress_dokumen)/2;
                            ?>
                            <tr>
                                <th scope="row"><?= Html::encode($kriteriaJson->kriteria) ?></th>
                                <td>
                                    <strong>Tabel <?= Html::encode($kriteriaJson->kriteria) ?>
                                        : <?= $prorgess ?>%</strong><br>
                                    <?= $kriteriaJson->judul ?>
                                    <div class="kt-space-10"></div>
                                    <?=
                                    Progress::widget([
                                        'percent' => $prorgess,
                                        'barOptions' => ['class' => 'progress-bar-info m-progress-lg'],
                                        'options' => ['class' => 'progress-sm']
                                    ]); ?>
                                </td>
                                <td style="padding-top: 15px;">
                                    <?= Html::a("<i class='la la-folder-open'></i>Lihat", [
                                        'lk/lihat-kriteria',
                                        'lk' => $lkProdi->id,
                                        'kriteria' => $kriteriaJson->kriteria,
                                        'prodi' => $modelProdi->id
                                    ], ['class' => 'btn btn-default btn-pill btn-elevate btn-elevate-air']) ?>

                                    <!--                        <button type="button" class="btn btn-danger">Lihat</button>-->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
