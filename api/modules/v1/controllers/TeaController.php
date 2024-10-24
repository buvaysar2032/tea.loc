<?php

namespace api\modules\v1\controllers;

use common\models\Tea;
use yii\helpers\ArrayHelper;

class TeaController extends AppController
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
        $collectionId = $this->request->get('tea_collection_id');

        if ($collectionId === null) {
            return $this->returnError('Необходимо передать ID коллекции.');
        }

        $tea = Tea::find()->where(['tea_collection_id' => $collectionId])->all();

        if (empty($tea)) {
            return $this->returnError('Чай не найден для данной коллекции.');
        }

        return $this->returnSuccess([
            'tea' => $tea
        ]);
    }
}
