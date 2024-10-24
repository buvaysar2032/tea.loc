<?php

use common\models\News;
use kartik\datecontrol\DateControl;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'date')->widget(DateControl::class, [
        'options' => ['placeholder' => 'Select issue date ...'],
    ]) ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_en')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'text')->widget(Widget::class, [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 100,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                    ],
                ],
            ]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'text_en')->widget(Widget::class, [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 100,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <br>
    <?= $form->field($model, 'status')->dropDownList(News::getList()) ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>