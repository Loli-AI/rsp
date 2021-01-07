<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hak_kelas_penjamin_pasien".
 *
 * @property int $id
 * @property string|null $hak_kelas
 */
class HakKelasPenjaminPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hak_kelas_penjamin_pasien';
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
            [['hak_kelas'], 'string', 'max' => 255],
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
            'hak_kelas' => 'Hak Kelas',
        ];
    }
}
