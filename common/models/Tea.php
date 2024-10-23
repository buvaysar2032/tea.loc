<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tea".
 *
 * @property int $id
 * @property int $tea_collection_id
 * @property string $title
 * @property string $title_en
 * @property string|null $subtitle
 * @property string|null $subtitle_en
 * @property string|null $description
 * @property string|null $description_en
 * @property string|null $background_image
 * @property string|null $stack_image
 * @property string|null $stack_image_en
 * @property string|null $weight
 * @property string|null $weight_en
 * @property string|null $brewing_temperature
 * @property string|null $brewing_temperature_en
 * @property string|null $brewing_time
 * @property string|null $brewing_time_en
 * @property int $buy_available
 * @property string|null $link
 * @property string|null $link_en
 * @property int|null $priority
 *
 * @property TeaCollections $teaCollection
 */
class Tea extends \yii\db\ActiveRecord
{
    public UploadedFile|string|null $imageFile = null;
    public UploadedFile|string|null $imageFile2 = null;
    public UploadedFile|string|null $imageFile3 = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tea_collection_id', 'title', 'title_en'], 'required'],
            [['tea_collection_id', 'buy_available', 'priority'], 'integer'],
            [['subtitle', 'subtitle_en', 'description', 'description_en', 'weight', 'weight_en', 'brewing_temperature', 'brewing_temperature_en', 'brewing_time', 'brewing_time_en', 'link', 'link_en'], 'string'],
            [['title', 'title_en', 'background_image', 'stack_image', 'stack_image_en'], 'string', 'max' => 255],
            [['tea_collection_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeaCollections::class, 'targetAttribute' => ['tea_collection_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tea_collection_id' => Yii::t('app', 'Tea Collection ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'subtitle_en' => Yii::t('app', 'Subtitle En'),
            'description' => Yii::t('app', 'Description'),
            'description_en' => Yii::t('app', 'Description En'),
            'background_image' => Yii::t('app', 'Background Image'),
            'stack_image' => Yii::t('app', 'Stack Image'),
            'stack_image_en' => Yii::t('app', 'Stack Image En'),
            'weight' => Yii::t('app', 'Weight'),
            'weight_en' => Yii::t('app', 'Weight En'),
            'brewing_temperature' => Yii::t('app', 'Brewing Temperature'),
            'brewing_temperature_en' => Yii::t('app', 'Brewing Temperature En'),
            'brewing_time' => Yii::t('app', 'Brewing Time'),
            'brewing_time_en' => Yii::t('app', 'Brewing Time En'),
            'buy_available' => Yii::t('app', 'Buy Available'),
            'link' => Yii::t('app', 'Link'),
            'link_en' => Yii::t('app', 'Link En'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }

    /**
     * Gets query for [[TeaCollection]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeaCollection()
    {
        return $this->hasOne(TeaCollections::class, ['id' => 'tea_collection_id']);
    }

    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        $this->imageFile2 = UploadedFile::getInstance($this, 'imageFile2');
        $this->imageFile3 = UploadedFile::getInstance($this, 'imageFile3');
        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        $this->deleteImage($this->background_image);
        $this->deleteImage($this->stack_image);
        $this->deleteImage($this->stack_image_en);

        if ($this->imageFile) {
            $this->background_image = $this->saveImage($this->imageFile);
        }

        if ($this->imageFile2) {
            $this->stack_image = $this->saveImage($this->imageFile2);
        }

        if ($this->imageFile3) {
            $this->stack_image_en = $this->saveImage($this->imageFile3);
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
