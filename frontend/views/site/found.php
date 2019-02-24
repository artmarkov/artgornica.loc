<?php

use yii\helpers\Html;

$query = yii\helpers\Html::encode($query);

$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/site']];
$this->title = "Результаты поиска по запросу \"$query\"";
$this->params['breadcrumbs'][] = $this->title;

//app\modules\search\SearchAssets::register($this);
$this->registerJs("jQuery('.search').highlight('{$query}');");
?>

<div class="row">
    <div class="col-md-6 col-md-offset-2">
        
        <?php
        if (!empty($hits)):
            foreach ($hits as $hit):
                ?>
                <h3><a href="<?= yii\helpers\Url::to($hit->slug, true) ?>"><?= $hit->title ?></a></h3>
                <p class="search"><?= $hit->content ?></p>
                <hr />
            <?php
            endforeach;
        else:
            ?>
            <div class="alert alert-danger"><h3>По запросу "<?= $query ?>" ничего не найдено!</h3></div>
        <?php
        endif;

        echo yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
        
        
    </div>
    <div class="col-md-3">
        
        <?= $this->render('_search_form', ['text' => "{$query}"]) ?>
        
        <?//= app\components\SectionsWidget::widget() ?>
        <hr>
        <?//= app\components\TagsWidget::widget() ?>
    </div>
</div>