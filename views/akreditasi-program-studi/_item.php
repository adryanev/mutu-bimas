<?php
/* @var $this yii\web\View*/
/* @var $model stdClass*/
/* @var $institusi \app\models\Institusi*/

use yii\bootstrap4\Html;
use yii\bootstrap4\Progress;
$url = \yii\helpers\Url::to(['akreditasi-program-studi/view','institusi'=>$institusi->id,'akreditasi'=>$model->id]);

$prodi = $model->prodi;
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
                            $prodiName = preg_split('/\s+/', $prodi->nama);

                            foreach ($prodiName as $word) {
                                $initial .= $word[0];
                            }

                            echo $initial
                            ?>
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <a href="#" class="kt-widget__username">
                                    <?= $prodi->nama ?>
                                    <i class="flaticon2-correct"></i>
                                </a>
                                <div class="kt-widget__action">
                                    <?= Html::a('Detail', $url, ['class' => 'btn btn-brand btn-sm btn-upper']) ?>
                                </div>
                            </div>
                            <div class="kt-widget__subhead">
                                <a href="#"><i class="flaticon2-edit"></i><?= $model->akreditasi->nama ?></a>
                                <a href="#"><i class="flaticon-calendar"></i><?= $model->akreditasi->tahun ?></a>
                                <a href="#"><i class="flaticon-buildings"></i><?= $model->akreditasi->lembaga ?></a>
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
                                            ['percent' => $model->progress, 'options' => ['class' => 'kt-bg-success']]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                        <?= $model->progress ?>%
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
                                                'percent' => $model->k9LedProdi->progress,
                                                'options' => ['class' => 'kt-bg-success']
                                            ]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                       <span><?= $model->k9LedProdi->progress ?>%</span>
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
                                                'percent' => $model->k9LkProdi->progress,
                                                'options' => ['class' => 'kt-bg-success']
                                            ]
                                        ],
                                        'options' => ['class' => 'progress', 'style' => 'height:5px;width:100%']
                                    ]) ?>

                                    <div class="kt-widget__stats">
                                       <span><?= $model->k9LkProdi->progress ?>%</span>
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
                                    class="kt-widget__value"><?= $model->kuantitatif ? Html::button('<i class="flaticon2-arrow-down"></i> Download',
                                        [
                                            'class' => 'btn btn-success btn-sm btn-pill btn-elevate btn-elevate-air showModalButton',
                                            'value' => \yii\helpers\Url::to(['/kuantitatif/prodi', 'id' =>
                                                $model->id,'institusi'=>$institusi->id]),
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
