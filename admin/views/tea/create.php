<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tea $model */

$this->title = Yii::t('app', 'Create Tea');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
