<?php

use common\models\Feedback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\FeedbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!----><?php //Html::a(Yii::t('app', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'message:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'moderation_status',
                'value' => function($model) {
                    return $model->moderation_status == Feedback::MODERATION_NEW ? 'Новый' :
                        ($model->moderation_status == Feedback::MODERATION_ACCEPTED ? 'Принятый' : 'Отклоненный');
                },
            ],
            'comment',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
