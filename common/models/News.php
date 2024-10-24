<?php

namespace common\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property int|null $priority
 * @property int $date
 * @property string|null $description
 * @property string|null $description_en
 * @property string|null $text
 * @property string|null $text_en
 * @property string|null $image
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{

    const PUBLISHED_YES = 1;
    const PUBLISHED_NO = 0;
    public UploadedFile|string|null $imageFile = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_en', 'date'], 'required'],
            [['priority', 'date', 'status'], 'integer'],
            [['description', 'description_en', 'text', 'text_en'], 'string'],
            [['title', 'title_en', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'priority' => Yii::t('app', 'Priority'),
            'date' => Yii::t('app', 'Date'),
            'description' => Yii::t('app', 'Description'),
            'description_en' => Yii::t('app', 'Description En'),
            'text' => Yii::t('app', 'Text'),
            'text_en' => Yii::t('app', 'Text En'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'imageFile' => Yii::t('app', 'Image'),
        ];
    }

    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        return parent::beforeValidate();
    }

    public function beforeSave($insert): bool
    {
        $this->deleteImage($this->image);

        if ($this->imageFile) {
            $this->image = $this->saveImage($this->imageFile);
        }

        return parent::beforeSave($insert);
    }

    public function deleteImage($imagePath)
    {
        if (!empty($imagePath)) {
            $fullPath = Yii::getAlias('@public/') . $imagePath;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
    }

    public function saveImage(UploadedFile $file)
    {
        $randomString = Yii::$app->security->generateRandomString();
        $fileName = $file->extension;
        $path = Yii::getAlias('@uploads') . '/' . $randomString . '.' . $fileName;

        if ($file->saveAs($path)) {
            return 'uploads/' . $randomString . '.' . $fileName;
        }

        return null;
    }

    public static function getList(): array
    {
        return [
            self::PUBLISHED_YES => 'Опубликовано',
            self::PUBLISHED_NO => 'Скрыто'
        ];
    }

    public function getStatusName(): string
    {
        $statusLabels = self::getList();

        if (isset($statusLabels[$this->status])) {
            return $statusLabels[$this->status];
        } else {
            return Yii::t('app', 'Неизвестный статус');
        }
    }

    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::class,
                'sortableAttribute' => 'priority'
            ],
        ];
    }
}
