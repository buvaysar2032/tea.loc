<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TeaCollections $model */

$this->title = Yii::t('app', 'Create Tea Collections');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tea Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collections-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
