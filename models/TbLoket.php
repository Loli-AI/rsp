<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_loket".
 *
 * @property int $id_loket
 * @property string|null $nama_loket
 */
class TbLoket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_loket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_loket'], 'required'],
            [['id_loket'], 'default', 'value' => null],
            [['id_loket'], 'integer'],
            [['nama_loket'], 'string', 'max' => 255],
            [['id_loket'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_loket' => 'Id Loket',
            'nama_loket' => 'Nama Loket',
        ];
    }
}
