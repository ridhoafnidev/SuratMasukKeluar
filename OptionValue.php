<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_value".
 *
 * @property int $id
 * @property int $catalog_option_id
 * @property string $name
 * @property int $sort_order
 * @property int $image_id
 *
 * @property SuratMasuk $catalogOption
 */
class OptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['catalog_option_id', 'sort_order', 'image_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['catalog_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuratMasuk::className(), 'targetAttribute' => ['catalog_option_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_option_id' => 'Catalog Option ID',
            'name' => 'Name',
            'sort_order' => 'Sort Order',
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOption()
    {
        return $this->hasOne(SuratMasuk::className(), ['id' => 'catalog_option_id']);
    }
}
