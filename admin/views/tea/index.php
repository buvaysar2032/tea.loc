<?php

use common\models\Tea;
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tea_collection_id',
            'title',
            'title_en',
            'subtitle:ntext',
            //'subtitle_en:ntext',
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