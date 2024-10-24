<?php

use common\models\Tea;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Tea $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tea-view">

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
            [
                'attribute' => 'tea_collection_id',
                'label' => Yii::t('app', 'Коллекция чая'),
                'value' => function (Tea $model) {
                    return $model->getCategoryName();
                }
            ],
            'title',
            'title_en',
            'subtitle:ntext',
            'subtitle_en:ntext',
            'description:html',
            'description_en:html',
            [
                'attribute' => 'background_image',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->background_image ? Html::img('/' . $model->background_image, ['alt' => 'Изображение поста', 'style' => 'width: auto; height: auto']) : Yii::t('app', 'Нет изображения');
                },
            ],
            [
                'attribute' => 'stack_image',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->stack_image ? Html::img('/' . $model->stack_image, ['alt' => 'Изображение поста', 'style' => 'width: auto; height: auto']) : Yii::t('app', 'Нет изображения');
                },
            ],
            [
                'attribute' => 'stack_image_en',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->stack_image_en ? Html::img('/' . $model->stack_image_en, ['alt' => 'Изображение поста', 'style' => 'width: auto; height: auto']) : Yii::t('app', 'Нет изображения');
                },
            ],
            'weight:ntext',
            'weight_en:ntext',
            'brewing_temperature:ntext',
            'brewing_temperature_en:ntext',
            'brewing_time:ntext',
            'brewing_time_en:ntext',
            [
                'attribute' => 'buy_available',
                'value' => function ($model) {
                    return $model->buy_available ? 'Да' : 'Нет';
                }
            ],
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->link, $model->link, ['target' => '_blank']);
                },
            ],
            [
                'attribute' => 'link_en',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->link_en, $model->link_en, ['target' => '_blank']);
                },
            ],
            'priority',
        ],
    ]) ?>

</div>
