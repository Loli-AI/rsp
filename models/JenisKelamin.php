<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kelamin".
 *
 * @property float $id
 * @property string|null $jenis_kelamin
 */
class JenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kelamin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'number'],
            [['jenis_kelamin'], 'string'],
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
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }
}
