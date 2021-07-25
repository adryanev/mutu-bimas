<?php
/**
 * @var $item array,
 * @var $institusi app\models\Institusi
 */
?>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $item]),
    'summary' => false,
    'itemView' => '_item',
    'viewParams' => ['institusi' => $institusi]
]) ?>
