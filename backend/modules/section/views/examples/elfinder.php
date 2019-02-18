<?php
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
?>
<div class="section-page-form">
     <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body" style="height: 800px;">
<?php
    echo ElFinder::widget([
    'language'         => 'ru',
    'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'containerOptions' => ['style' => "height: 100%"],
  //  'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории 
   // 'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
]);
?>

</div>
</div>
</div>
</div>
</div>