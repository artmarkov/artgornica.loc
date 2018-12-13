<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-error">

    <section class="container">

        <div class="row">

            <div class="col-md-12">
                <h2>
                    <strong>Oops</strong>, This Page Could Not Be Found!
                    <span class="subtitle">We're sorry, but the page you were looking for doesn't exist.</span>
                </h2>

                <div class="alert alert-danger">
                    <i class="fa fa-frown-o"></i> 
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <div class="e404"><?= nl2br(Html::encode($code)) ?></div> 
            </div>


        </div>

    </section>

</div>

