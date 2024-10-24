<?php

namespace api\modules\v1\controllers;

use common\models\News;
use yii\helpers\ArrayHelper;

class NewsController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authentificator' => [
                'except' => ['index']
            ]
        ]);
    }

    public function actionIndex(): array
    {
        $news = News::find()->where(['status' => 1])->orderBy(['priority' => SORT_ASC])->all();

        return $this->returnSuccess([
            'news' => $news
        ]);
    }
}
