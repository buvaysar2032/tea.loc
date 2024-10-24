<?php

use common\models\TeaCollections;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tea $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tea-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <br>
    <?= $form->field($model, 'tea_collection_id')->dropDownList(TeaCollections::getList(), ['prompt' => 'Выберите коллекцию чая']) ?>
    <br>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'subtitle_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'description')->widget(Widget::class, [
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
            <?= $form->field($model, 'description_en')->widget(Widget::class, [
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

    <?= $form->field($model, 'imageFile2')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile3')->fileInput(['maxlength' => true]) ?>
    <br>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'weight_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'brewing_temperature')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'brewing_temperature_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'brewing_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'brewing_time_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <br>
    <?= $form->field($model, 'buy_available')->checkbox() ?>
    <br>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>