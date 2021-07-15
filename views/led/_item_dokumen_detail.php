<?php
/**
 * @var $this yii\web\View
 * @var $nomor int
 * @var $path string
 * @var $jenis string
 * @var $prodi
 * @var $detail
 * @var $kriteria
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

                <?= FileIconHelper::getIconByExtension($detail->bentuk_dokumen) ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php $type = FileTypeHelper::getType($detail->bentuk_dokumen);

                if ($type === FileTypeHelper::TYPE_STATIC_TEXT || $type === FileTypeHelper::TYPE_LINK) : ?>
                    <p>
                        <?= Html::encode($detail->nama_dokumen) ?>
                        <?= $detail->is_verified ? "<span class='kt-badge kt-badge--success
        kt-badge--inline kt-badge--pill kt-badge--rounded'>verified</span>" : "<span class='kt-badge kt-badge--danger
        kt-badge--inline kt-badge--pill kt-badge--rounded'>not verified</span>" ?>

                    </p>

                <?php else: ?>
                    <p>
                        <?= $detail->nama_dokumen . ' (' . $detail->isi_dokumen . ')' ?>
                        <?= $detail->is_verified ? "<span class='kt-badge kt-badge--success
        kt-badge--inline kt-badge--pill kt-badge--rounded'>verified</span>" : "<span class='kt-badge kt-badge--danger
        kt-badge--inline kt-badge--pill kt-badge--rounded'>not verified</span>" ?>

                    </p>
                <?php endif; ?>

            </div>
        </div>
    </td>
    <td>
        <div class="row">
            <div class="col-lg-12 pull-right">
                <?php $type = FileTypeHelper::getType($detail->bentuk_dokumen);
                if ($type !== FileTypeHelper::TYPE_LINK):?>

                    <?= Html::button('<i class="la la-eye"></i> &nbsp;Lihat', [
                        'value' => \yii\helpers\Url::to([
                            'led/lihat-dokumen',
                            'id' => $detail->id,
                            'kriteria' => $kriteria,
                            'institusi'=>$institusi->id
                        ]),
                        'title'=>$detail->nama_dokumen,
                        'class'=>'btn btn-info btn-sm btn-pill btn-elevate btn-elevate-air showModalButton'
                    ]) ?>
                <?php else: ?>
                    <?= Html::a('<i class="la la-external-link"></i> Lihat', $detail->isi_dokumen, [
                        'class' => 'btn btn-info btn-sm btn-pill btn-elevate btn-elevate-air',
                        'target' => '_blank'
                    ]) ?>
                <?php endif; ?>
                <?php if ($type !== FileTypeHelper::TYPE_LINK && $type !== FileTypeHelper::TYPE_STATIC_TEXT): ?>
                    <?= Html::a('<i class="la la-download"></i>&nbsp;Unduh', [
                        $controller . '/download-detail',
                        'kriteria' => $kriteria,
                        'dokumen' => $detail->id,
                        'led' => $model->id,
                        'jenis' => $jenis,
                        'institusi'=>$institusi->id

                    ], ['class' => 'btn btn-warning btn-sm btn-pill btn-elevate btn-elevate-air']) ?>
                <?php endif; ?>

            </div>

        </div>
    </td>
</tr>

