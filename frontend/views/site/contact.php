<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yeesoft\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <section id="contact" class="container">
        <div class="row">
            <!-- FORM -->
            <div class="col-md-12">

                <h2>Drop me a line or just say <strong><em>Hello!</em></strong></h2>

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">

                            <?= $form->field($model, 'name') ?>
                        </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'email') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">

                            <?= $form->field($model, 'subject') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">

                            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">

                            <?= $this->render('@common/widgets/views/_captcha', ['model' => $model, 'form' => $form]) ?>
                          
                        </div>
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-md-12">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg', 'name' => 'contact-button']) ?>
                    </div>
                </div>
                </form>

            </div>
            <?php ActiveForm::end(); ?>
            <!-- /FORM -->

        </div>

    </section>
</div>