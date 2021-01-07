<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_ms_asal_rujukan".
 *
 * @property int $id
 * @property string|null $nama
 * @property int|null $aktif
 * @property string|null $flag
 */
class BMsAsalRujukan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b_ms_asal_rujukan';
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
            [['nama'], 'string', 'max' => 30],
            [['flag'], 'string', 'max' => 1],
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
            'flag' => 'Flag',
        ];
    }
}
