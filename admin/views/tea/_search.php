<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TeaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tea_collection_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'subtitle_en') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'background_image') ?>

    <?php // echo $form->field($model, 'stack_image') ?>

    <?php // echo $form->field($model, 'stack_image_en') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'weight_en') ?>

    <?php // echo $form->field($model, 'brewing_temperature') ?>

    <?php // echo $form->field($model, 'brewing_temperature_en') ?>

    <?php // echo $form->field($model, 'brewing_time') ?>

    <?php // echo $form->field($model, 'brewing_time_en') ?>

    <?php // echo $form->field($model, 'buy_available') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'link_en') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
