<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempat_layanan_radiologi".
 *
 * @property int $id
 * @property string|null $nama_tempat_layanan
 */
class TempatLayananRadiologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tempat_layanan_radiologi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['nama_tempat_layanan'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tempat_layanan' => 'Nama Tempat Layanan',
        ];
    }
}
