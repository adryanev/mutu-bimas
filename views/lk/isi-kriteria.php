<?php

use yii\bootstrap4\Progress;

/* @var $this yii\web\View */
/* @var $response */
/* @var $institusi \app\models\Institusi*/

$modelKriteria = $response->lkProdiKriteria;
$lkProdi = $response->lkProdi;
$modelNarasi  = $response->modelNarasi;
$poinKriteria = $response->poinKriteria;
$path  = $response->path;

$prodi = $response->prodi;
$untuk  = $response->untuk;
$kriteria  = $response->kriteria;
$akreditasiProdi = $response->akreditasiProdi;
$akreditasi = $response->akreditasi;
$modelKriteria->progress = ($modelKriteria->progress_narasi + $modelKriteria->progress_dokumen)/2;


$this->title = 'Kriteria ' . $kriteria;
$this->params['breadcrumbs'][] = [
    'label' => 'Akreditasi Prodi',
    'url' => ['akreditasi-program-studi/index']
];
$this->params['breadcrumbs'][] = [
    'label' => $institusi->nama .' - '.$prodi->nama,
    'url' => ['akreditasi-program-studi/view', 'akreditasi' => $akreditasiProdi->id, 'prodi' => $prodi->id,
        'institusi'=>$institusi->id]
];
$this->params['breadcrumbs'][] = $this->title;

?>

    <div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <?= $this->title ?>

            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
                <strong>Kelengkapan Berkas &nbsp; : <?= $modelKriteria->progress ?> %</strong>
                <div class="kt-space-10"></div>
                <?=
                Progress::widget([
                    'percent' => $modelKriteria->progress,
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-sm']
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first" style="margin-bottom: 0;">

            <!--begin::Accordion-->
            <div class="accordion accordion-solid  accordion-toggle-arrow" id="accordion">

                <?php foreach ($poinKriteria

                               as $key => $item) :
                    $modelAttribute = '_' . str_replace('.', '_', $item->tabel); ?>

                    <div class="card">
                        <div class="card-header" id="heading<?= $key ?>">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse<?= $key ?>"
                                 aria-expanded="false" aria-controls="collapse<?= $key ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <i class="flaticon-file-2"></i> <?=
                                        $item->tabel ?>&nbsp;
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <small>&nbsp;<?= $item->isi ?></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>">
                            <div class="card-body">
                                <div class="kt-spinner kt-spinner--center kt-spinner--primary kt-spinner--v2"
                                     id="spinner-<?= $key ?>" data-poin="<?= $item->tabel ?>"></div>
                                <div id="result-<?= $item->tabel ?>"></div>


                            </div>
                        </div>


                    </div>

                <?php endforeach; ?>
                <!--end::Accordion-->
            </div>
        </div>
    </div>

<?php
$url = \yii\helpers\Url::to([
    'lk/butir-item',
    'kriteria' => $kriteria,
    'lk' => $lkProdi->id,
    'prodi' => $prodi->id,
    'untuk' => $untuk,
    'institusi'=>$institusi->id
], true);
$js = <<<JS
var loaded = {};
$('#accordion').on('shown.bs.collapse',function(t) {
var url = new URL("{$url}");
var target = t.target.children[0].children[0];
var poin = target.dataset.poin
url.searchParams.append('poin',poin)
if(loaded[poin]==null){
$.ajax({
url:url,
method:'GET',
dataType:"html"
}).done(function(html){
    loaded[poin] = html
    $("#"+target.id).removeAttr('class').next().html(html)


})
}

})
JS;

$this->registerJs($js);


