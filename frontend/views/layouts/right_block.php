<?php
use yii\helpers\Url;

?>
<!-- blog search -->
<div class="widget">

    <h3>Поиск Блога</h3>

    <form method="get" action="#" class="input-group">
        <input type="text" class="form-control" name="k" id="k" value="" placeholder="search..." />
        <span class="input-group-btn">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </span>
    </form>
</div>

<!-- categories -->
<div class="widget">

    <h4>КАТЕГОРИИ</h4>
    <?php
    $categoryKey = '__categoryKey' . Yii::$app->language;

    if (!$menuCategory = Yii::$app->cache->get($categoryKey)) {
        $menuCategory = \frontend\components\MenuCategoryWidget::widget();

        Yii::$app->cache->set($categoryKey, $menuCategory, 3600);
    }
    echo $menuCategory;
    ?>
    
</div>

<!-- recent posts -->
<div class="widget">
    
    <h4>ОБЛАКО ТЕГОВ</h4>
    <?php
    $TagCloudKey = '__cloudKey' . Yii::$app->language;

    if (!$TagCloud = Yii::$app->cache->get($TagCloudKey)) {
        $TagCloud = \frontend\components\TagCloudWidget::widget([
                    'maxTags' => false,
                    'urlRoute' => '/tag/index',
                    'tagClasses' => ['fsize13', 'fsize14', 'fsize15', 'fsize16', 'fsize17', 'fsize18', 'fsize19', 'fsize20', 'fsize26'],
                    'tagsArray' => \backend\modules\post\models\Tag::getTagsCloud()
        ]);
        Yii::$app->cache->set($TagCloudKey, $TagCloud, 3600);
    }
    echo $TagCloud;
    ?>

</div>