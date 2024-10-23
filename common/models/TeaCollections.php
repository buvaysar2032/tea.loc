<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tea_collections".
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string|null $subtitle
 * @property string|null $subtitle_en
 * @property string|null $color
 * @property string|null $image
 *
 * @property Tea[] $teas
 */
class TeaCollections extends \yii\db\ActiveRecord
{
    public UploadedFile|string|null $imageFile = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tea_collections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_en'], 'required'],
            [['subtitle', 'subtitle_en'], 'string'],
            [['title', 'title_en', 'color', 'image'], 'string', 'max' => 255],
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
            'subtitle' => Yii::t('app', 'Subtitle'),
            'subtitle_en' => Yii::t('app', 'Subtitle En'),
            'color' => Yii::t('app', 'Color'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[Teas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeas()
    {
        return $this->hasMany(Tea::class, ['tea_collection_id' => 'id']);
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
}
