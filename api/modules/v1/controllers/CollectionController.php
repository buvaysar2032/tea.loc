<?php

namespace api\modules\v1\controllers;

use common\models\TeaCollections;
use yii\helpers\ArrayHelper;

class CollectionController extends AppController
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
        $collections = TeaCollections::find()->all();

        return $this->returnSuccess([
            'collections' => $collections
        ]);
    }
}
