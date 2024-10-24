<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $moderation_status
 * @property string|null $comment
 */
class Feedback extends \yii\db\ActiveRecord
{
    const MODERATION_NEW = 0;
    const MODERATION_ACCEPTED = 10;
    const MODERATION_REJECTED = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['moderation_status'], 'integer'],
            [['name', 'email', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'moderation_status' => Yii::t('app', 'Moderation Status'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    public function behaviors() // Время
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time(),
            ],
        ];
    }
}
