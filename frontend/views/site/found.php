<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$query = yii\helpers\Html::encode($query);

$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/blog']];
$this->title = "Результаты поиска по запросу \"$query\"";
$this->params['breadcrumbs'][] = $this->title;

//app\modules\search\SearchAssets::register($this);
//$this->registerJs("jQuery('.search').highlight('{$query}');");
?>

<div class="blog_search">
    <section class="container masonry-sidebar">
        <div class="row">
            <div class="left col-md-9">

                <?php
                if (!empty($hits)):
                    // echo '<pre>' . print_r($hits, true) . '</pre>';
                    foreach ($hits as $hit):
                        ?>
                        <h3><a href="<?= yii\helpers\Url::to($hit->url, true) ?>"><?= $hit->title ?></a></h3>
                        <p class="search"><?= $hit->description ?></p>
                        <hr />
                        <?php
                    endforeach;
                else:
                    ?>
                    <div class="alert alert-danger"><h3>По запросу "<?= $query ?>" ничего не найдено!</h3></div>
                <?php
                endif;
                ?>
                <!-- PAGINATION -->
                <div class="text-center">
                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
                </div>

            </div>
            <aside class="right col-md-3">
                 <?= $this->render('_blog_search', ['text' => "{$query}"]) ?>
            </aside>
        </div>
    </section>
</div>
