<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AplikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Aplikasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-list-2"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        <?= Html::encode($this->title) ?> <small>portlet sub title</small>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <?= Html::button(Yii::t('app', '<i class=flaticon2-add></i> Tambah Aplikasi'), ['value' => Url::to(['create']), 'title' => Yii::t('app', 'Tambah Aplikasi'), 'class' => 'showModalButton btn btn-success btn-elevate btn-elevate-air']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="aplikasi-index">




                        <?php Pjax::begin(); ?>
                                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn','header'=>'No'],

            'institusi.nama',
            'nama',
            'endpoint:url',
            'created_at:datetime',
            //'updated_at',

                        ['class' => 'app\widgets\ActionColumn','header'=>'Aksi'],
                        ],
                        ]); ?>

                        <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
        <!--end::Portlet-->

    </div>
</div>



