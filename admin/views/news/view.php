<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\News $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'title_en',
            'priority',
            'date:date',
            'description:ntext',
            'description_en:ntext',
            'text:html',
            'text_en:html',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->image ? Html::img('/' . $model->image, ['alt' => 'Изображение поста', 'style' => 'width: auto; height: auto']) : Yii::t('app', 'Нет изображения');
                },
            ],
            [
                'attribute' => 'status',
                'value' => function (\common\models\News $model) {
                    return $model->getStatusName();
                },
            ],
        ],
    ]) ?>

</div>
