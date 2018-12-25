<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yeesoft\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('yee', 'Contact');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <section id="contact" class="container">
        <div class="row">
            <!-- FORM -->           

            <h2><strong><em>Напишите мне.</em></strong> Я обязательно свяжусь с Вами!</h2>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="row">

                <div class="col-md-6">

                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="col-md-6">

                    <?= $form->field($model, 'email') ?>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12">

                    <?= $form->field($model, 'subject') ?>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12">

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <?= $this->render('@common/widgets/views/_captcha', ['model' => $model, 'form' => $form]) ?>

                </div>

            </div>

            <div class="row pull-right">
                <div class="col-md-12">
                    <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary btn-lg', 'name' => 'contact-button']) ?>
                </div>
            </div>
            </form>


            <?php ActiveForm::end(); ?>
            <!-- /FORM -->

        </div>

    </section>
</div>