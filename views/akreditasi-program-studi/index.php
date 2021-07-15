<?php
/**
 * @var $this yii\web\View
 * @var $collection yii2mod\collection\Collection
 */

$this->title = 'Akreditasi Program Studi';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php foreach ($collection as $item) :
    $institusi = $item->institusi ?>
<div class="mb-3">
    <h4><?= $institusi->nama ?></h4>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $item->items]),
        'summary' => false,
        'itemView' => '_item',
        'viewParams' => ['institusi' => $institusi]
    ]) ?>
</div>



<?php endforeach; ?>
