<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitusiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institusi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nama_ketua') ?>

    <?= $form->field($model, 'tanggal_berdiri') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'nomor_telp') ?>

    <?php // echo $form->field($model, 'homepage') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
