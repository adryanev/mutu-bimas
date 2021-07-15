<?php
/**
 * @var $this yii\web\View
 * @var $response
 * @var $institusi \app\models\Institusi
 */

$kriteria = $response->kriteria;
$prodi = $response->prodi;
$akreditasiProdi = $response->akreditasiProdi;
$akreditasi = $response->akreditasi;
$poinKriteria = $response->poinKriteria;
$model = $response->model;
$untuk = $response->untuk;


$this->title = 'Kriteria ' . $kriteria;
$this->params['breadcrumbs'][] = [
    'label' => 'Akreditasi Prodi',
    'url' => ['akreditasi-program-studi/index']
];
$this->params['breadcrumbs'][] = [
    'label' => "$institusi->nama - $prodi->nama",
    'url' => ['akreditasi-program-studi/view', 'akreditasi' => $akreditasiProdi->id, 'prodi' => $prodi->id,
        'institusi'=>$institusi->id]
];
$this->params['breadcrumbs'][] = $this->title;


use app\helpers\NomorKriteriaHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\Progress;

?>

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <?= Html::encode($this->title) ?>

                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <strong>Kelengkapan Berkas &nbsp; : <?= $model->progress ?> %</strong>
                    <div class="kt-space-10"></div>
                    <?=
                    Progress::widget([
                        'percent' => $model->progress,
                        'barOptions' => ['class' => 'progress-bar-info m-progress-lg'],
                        'options' => ['class' => 'progress-sm']
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first" style="margin-bottom: 0;">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid  accordion-toggle-plus" id="accordion">

                    <?php foreach ($poinKriteria as $key => $item):
                        $modelAttribute = NomorKriteriaHelper::changeToDbFormat($item->nomor);

                        ?>
                        <div class="card">
                            <div class="card-header" id="heading<?= $key ?>">
                                <div class="card-title collapsed" data-toggle="collapse"
                                     data-target="#collapse<?= $key ?>"
                                     aria-expanded="false" aria-controls="collapse<?= $key ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <i class="flaticon-file-2"></i> <?=
                                            $item->nomor ?>&nbsp;
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <small>&nbsp;<?= $item->nama ?></small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>">
                                <div class="card-body">
                                    <div class="kt-spinner kt-spinner--center kt-spinner--primary kt-spinner--v2"
                                         id="spinner-<?= $key ?>" data-poin="<?= $item->nomor ?>"></div>
                                    <div id="result-<?= $item->nomor ?>"></div>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <!--end::Accordion-->

            </div>
        </div>
    </div>
<?php
$url = \yii\helpers\Url::to([
    'led/butir-item',
    'kriteria' => $kriteria,
    'led' => $model->id,
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


