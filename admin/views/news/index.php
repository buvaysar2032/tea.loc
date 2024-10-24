<?php

use common\models\News;
use himiklab\sortablegrid\SortableGridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= SortableGridView::widget([
        'sortableAction' => Url::toRoute(['sort']),
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title_en',
            //'priority',
            'date:date',
            //'description:ntext',
            //'description_en:ntext',
            //'text:ntext',
            //'text_en:ntext',
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

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, News $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
