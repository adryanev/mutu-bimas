<?php
/**
 * @var $this yii\web\View
 * @var $institusi
 */

$this->title = 'Akreditasi Program Studi';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php foreach ($institusi as $item) :
    ?>
<div class="mb-3">
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <div class="accordion accordion-solid  accordion-toggle-plus" id="accordion">

                <div class="card">
                    <div class="card-header" id="heading<?= $item->id ?>">
                        <div class="card-title collapsed" data-toggle="collapse"
                             data-target="#collapse<?= $item->id ?>"
                             aria-expanded="false" aria-controls="collapse<?= $item->id ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <i class="flaticon-file-2"></i> <?=
                                    $item->id ?>&nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <small>&nbsp;<?= $item->nama ?></small>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse<?= $item->id ?>" class="collapse" aria-labelledby="heading<?= $item->id ?>">
                        <div class="card-body">
                            <div class="kt-spinner kt-spinner--center kt-spinner--primary kt-spinner--v2"
                                 id="spinner-<?= $item->id ?>" data-poin="<?= $item->id ?>"></div>
                            <div id="result-<?= $item->id ?>"></div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<?php
$url = \yii\helpers\Url::to([
    'akreditasi-program-studi/load-akreditasi'
], true);
$js = <<<JS
var loaded = {};
$('.accordion').on('shown.bs.collapse',function(t) {
var url = new URL("{$url}");
var target = t.target.children[0].children[0];
var poin = target.dataset.poin
url.searchParams.append('id',poin)
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

