<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "a_dosis".
 *
 * @property int $id
 * @property string|null $nama
 * @property int|null $aktif
 */
class Dosis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'a_dosis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'aktif'], 'default', 'value' => null],
            [['id', 'aktif'], 'integer'],
            [['nama'], 'string', 'max' => 75],
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
            'nama' => 'Nama',
            'aktif' => 'Aktif',
        ];
    }
}
