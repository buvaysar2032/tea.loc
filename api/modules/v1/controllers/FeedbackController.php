<?php

namespace api\modules\v1\controllers;

use common\models\Feedback;
use Yii;
use yii\helpers\ArrayHelper;

class FeedbackController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authentificator' => [
                'except' => ['create']
            ]
        ]);
    }

    public function actionCreate(): array
    {
        $request = Yii::$app->request->post();

        if (empty($request['name']) || empty($request['email']) || empty($request['message'])) {
            return $this->returnError('Все поля обязательны для заполнения.');
        }

        $feedback = new Feedback();
        $feedback->name = $request['name'];
        $feedback->email = $request['email'];
        $feedback->message = $request['message'];

        if (!$feedback->save()) {
            return $this->returnError('Не удалось сохранить сообщение.', $feedback->getErrors());
        }

        return $this->returnSuccess(['message' => 'Сообщение отправлено успешно.']);
    }
}
