<?php

use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\media\models\Media */

$this->title = Yii::t('yee/media', 'Upload New File');

if ($mode !== 'modal') {
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div id="uploadmanager">
            <p>
                <?= Html::a('← ' . Yii::t('yee/media', 'Back to file manager'), ($mode == 'modal') ? ['manage/index', 'mode' => 'modal'] : ['default/index']) ?>
            </p>

            <?= FileUploadUI::widget([
                'model' => $model,
                'attribute' => 'file',
                'formView' => '@backend/modules/media/views/upload-widget/form',
                'uploadTemplateView' => '@backend/modules/media/views/upload-widget/upload',
                'downloadTemplateView' => '@backend/modules/media/views/upload-widget/download',
                'clientOptions' => [
                    'autoUpload' => Yii::$app->getModule('media')->autoUpload,
                ],
                'url' => ['upload'],
                'gallery' => false,
            ]) ?>

        </div>
    </div>
</div>