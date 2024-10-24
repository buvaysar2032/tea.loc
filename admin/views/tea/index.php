<?php

use common\models\Tea;
use himiklab\sortablegrid\SortableGridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TeaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Teas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tea'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= SortableGridView::widget([
        'sortableAction' => Url::toRoute(['sort']),
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'tea_collection_id',
                'label' => Yii::t('app', 'Коллекция чая'),
                'value' => function (Tea $model) {
                    return $model->getCategoryName();
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\TeaCollections::find()->all(), 'id', 'title'),
                'contentOptions' => ['style' => 'width: 200px;'],
            ],
            'title',
            'title_en',
            'subtitle:ntext',
            'subtitle_en:ntext',
            //'description:ntext',
            //'description_en:ntext',
            //'background_image',
            //'stack_image',
            //'stack_image_en',
            //'weight:ntext',
            //'weight_en:ntext',
            //'brewing_temperature:ntext',
            //'brewing_temperature_en:ntext',
            //'brewing_time:ntext',
            //'brewing_time_en:ntext',
            //'buy_available',
            //'link:ntext',
            //'link_en:ntext',
            //'priority',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tea $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
