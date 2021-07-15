<?php
/**
 * @var $this yii\web\View
 */

use app\helpers\FileIconHelper;
use app\helpers\FileTypeHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;

$controller = $this->context->id;
?>
<tr>
    <td></td>
    <td>
        <div class="row">
            <div class="col-lg-12 text-center">

                <?= FileIconHelper::getIconByExtension($v->bentuk_dokumen) ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p><?= $v->nama_dokumen . ' (' . $v->isi_dokumen . ')' ?>
                    <?= $v->is_verified ? "<span class='kt-badge kt-badge--success
        kt-badge--inline kt-badge--pill kt-badge--rounded'>verified</span>" : "<span class='kt-badge kt-badge--danger
        kt-badge--inline kt-badge--pill kt-badge--rounded'>not verified</span>" ?>
                </p>

            </div>
        </div>
    </td>
    <td>
        <div class="row pull-right">
            <div class="col-lg-12">
                <?php $type = FileTypeHelper::getType($v->bentuk_dokumen);
                if ($type !== FileTypeHelper::TYPE_LINK):?>
                    <?= Html::button('<i class="la la-eye"></i> &nbsp;Lihat', [
                        'value' => \yii\helpers\Url::to([
                            'lk/lihat-dokumen',
                            'id' => $v->id,
                            'kriteria' => $kriteria,
                            'institusi'=>$institusi->id
                        ]),
                        'title'=>$v->nama_dokumen,
                        'class'=>'btn btn-info btn-sm btn-pill btn-elevate btn-elevate-air showModalButton'
                    ]) ?>
                <?php else: ?>
                    <?= Html::a('<i class="la la-external-link"></i> Lihat', $v->isi_dokumen, [
                        'class' => 'btn btn-info btn-sm btn-pill btn-elevate btn-elevate-air',
                        'target' => '_blank'
                    ]) ?>
                <?php endif; ?>
                <?php if (!($type === FileTypeHelper::TYPE_LINK || $type === FileTypeHelper::TYPE_STATIC_TEXT)): ?>
                    <?= Html::a('<i class="la la-download"></i>&nbsp;Unduh', [
                        $controller . '/download-detail',
                        'kriteria' => $kriteria,
                        'dokumen' => $v->id,
                        'lk' => $lkProdi->id,
                        'jenis' => $jenis,
                        'prodi' => $prodi->id,
                        'institusi'=>$institusi->id

                    ], ['class' => 'btn btn-warning btn-sm btn-pill btn-elevate btn-elevate-air']) ?>
                <?php endif; ?>
            </div>

        </div>
    </td>
</tr>
