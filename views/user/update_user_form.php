<?php

use app\models\User;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\forms\user\UpdateUserForm */
/* @var $modelPassword app\models\forms\user\UpdatePasswordForm */
/* @var $form ActiveForm */
/* @var $dataRoles [] */
/* @var $tipe [] */
$this->title = 'Update Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-add-1"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="user-create">

                    <div class="update_user_form">

                        <?php $form = ActiveForm::begin(['id'=>'update-user-form']); ?>

                        <?= $form->field($model, 'username')->textInput() ?>
                        <?= $form->field($model, 'email')->textInput() ?>
                        <?= $form->field($model, 'status')->dropDownList([User::STATUS_ACTIVE => 'Aktif', User::STATUS_INACTIVE => 'Tidak Aktif'], ['prompt' => 'Pilih Status User']) ?>
                        <?= $form->field($model, 'hak_akses')->dropDownList( $dataRoles,['prompt'=>'Pilih Hak Akses']) ?>

                        <?= $form->field($model, 'nama_lengkap')->textInput() ?>


                        <div class="form-group">
                            <?= Html::submitButton('<i class=\'la la-save\'></i> Simpan', ['class' => 'btn btn-pill btn-elevate btn-elevate-air btn-brand']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div><!-- create_user_form -->


                </div>
            </div>
        </div>
        <!--end::Portlet-->

    </div>
</div>


<div class="row">
    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-add-1"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="user-create">

                    <div class="update_password_from">

                        <?php $form = ActiveForm::begin(['id'=>'update-password-form']); ?>

                        <?= $form->field($modelPassword, 'oldPassword')->passwordInput() ?>
                        <?= $form->field($modelPassword, 'newPassword')->passwordInput() ?>
                        <?= $form->field($modelPassword, 'repeatPassword')->passwordInput() ?>


                        <div class="form-group">
                            <?= Html::submitButton('<i class=\'la la-save\'></i> Simpan', ['class' => 'btn btn-pill btn-elevate btn-elevate-air btn-brand']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div><!-- create_user_form -->


                </div>
            </div>
        </div>
        <!--end::Portlet-->

    </div>
</div>

