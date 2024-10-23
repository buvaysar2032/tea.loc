<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tea $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tea_collection_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'subtitle_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile2')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile3')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'weight_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brewing_temperature')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brewing_temperature_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brewing_time')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brewing_time_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'buy_available')->textInput() ?>

    <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
