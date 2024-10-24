<?php

use common\models\Feedback;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Feedback $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moderation_status')->dropDownList([
        Feedback::MODERATION_NEW => 'Новый',
        Feedback::MODERATION_ACCEPTED => 'Принятый',
        Feedback::MODERATION_REJECTED => 'Отклоненный',
    ]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
