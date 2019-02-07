<?php

use yeesoft\widgets\ActiveForm;
use yeesoft\helpers\Html;

?>
<?php $form = ActiveForm::begin(); ?>

<div class="works-author-widget">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">

                             <?= Html::a(Yii::t('yee', 'Add'), ['#'], [
                                                'class' => 'btn btn-primary add-to-slides-layers',
                                                'data-id' => $model->id,
                                        ]);
                            ?>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <?php $data = \backend\modules\section\models\SlidesLayers::getSlidesLayersList($model->id); ?>
                            <?php if (!empty($data)): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?= Yii::t('yee', 'Content'); ?></th>
                                                <th><?= Yii::t('yee/section', 'Data X'); ?></th>
                                                <th><?= Yii::t('yee/section', 'Data Y'); ?></th>
                                                <th><?= Yii::t('yee/section', 'Data Speed'); ?></th>
                                                <th><?= Yii::t('yee/section', 'Data Start'); ?></th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
   
                                            
                            <?php foreach ($data as $id => $item): ?>
                                            
   
                                                <tr>
                                                    <td><?= ++$id ?></td>
                                                    <td style="width: 60%"><?= $item['content'] ?></td>
                                                    <td><?= $item['data_x'] ?></td>
                                                    <td><?= $item['data_y'] ?></td>
                                                    <td><?= $item['data_speed'] ?></td>
                                                    <td><?= $item['data_start'] ?></td>
                                                    
                                                    <td><?= Html::a('<span class="glyphicon glyphicon-pencil text-color-default" aria-hidden="true"></span>', ['#'], [
                                                            'class' => 'update-layers',
                                                            'data-id' => $item['id'],
                                                        ]);
                                                        ?>
                                                    <?= Html::a('<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>', ['#'], [
                                                            'class' => 'remove-layers',
                                                            'data-id' => $item['id'],
                                                        ]);
                                                        ?>
                                                    </td>
                                                </tr>
                             <?php endforeach ?>
                                               
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php
$js = <<<JS

function showLayers(author) {
    $('#slides-layers-modal .modal-body').html(author);
    $('#slides-layers-modal').modal();
}

$('.add-to-slides-layers').on('click', function (e) {

    e.preventDefault();
    
    var id = $(this).data('id')
       

    $.ajax({
        url: '/admin/section/slides-layers/init-layers',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res)  alert('Error...');
           // console.log(res);
           else showLayers(res);
        },
        error: function () {
            alert('Script Error!');
        }
    });
});

$('.update-layers').on('click', function (e) {

    e.preventDefault();

    var id = $(this).data('id');

    $.ajax({
        url: '/admin/section/slides-layers/update-layers',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res)  alert('Error!');
           // console.log(res);
           else showLayers(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});

$('.remove-layers').on('click', function (e) {

    e.preventDefault();
    
    var id = $(this).data('id');

    $.ajax({
        url: '/admin/section/slides-layers/remove',
        data: {id: id},
        type: 'GET'
    });
});

JS;

$this->registerJs($js);
?>