<?php
/**
 * @var $this yii\web\View
 * @var $untuk string
 * @var $led
 * @var $json
 * @var $kriteria []
 * @var $prodi
 * @var $json_eksternal
 * @var $json_profil
 * @var $json_analisis
 * @var $modelEksternal
 * @var $modelAnalisis
 * @var $modelProfil
 * @var $institusi
 */

use yii\bootstrap4\Html;
use yii\bootstrap4\Progress;

?>
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Laporan Evaluasi Program Studi
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
                <div class="pull-right ml-2 mr-2">
                    <strong>Pengisian:&nbsp;<?= Html::encode($led->progress) ?> %</strong>
                    <div class="kt-space-10"></div>
                    <?=
                    Progress::widget([
                        'percent' => $led->progress,
                        'barOptions' => ['class' => 'progress-bar-info m-progress-lg'],
                        'options' => ['class' => 'progress-sm']
                    ]); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first" style="margin-bottom: 0;">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->render('_tabel_led_eksternal',
                        compact('json_eksternal', 'modelEksternal', 'untuk', 'prodi', 'led','institusi')) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->render('_tabel_led_profil',
                        compact('json_profil', 'modelProfil', 'untuk', 'prodi', 'led','institusi')) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->render('_tabel_led_kriteria', compact('json', 'kriteria', 'prodi', 'untuk', 'led','institusi')) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->render('_tabel_led_analisis',
                        compact('json_analisis', 'modelAnalisis', 'untuk', 'prodi', 'led','institusi')) ?>

                </div>
            </div>
        </div>
    </div>
</div>
