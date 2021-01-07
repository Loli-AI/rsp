<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokter_pengganti".
 *
 * @property int $id
 * @property string|null $nama_dokter
 */
class DokterPengganti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter_pengganti';
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
            [['nama_dokter'], 'string', 'max' => 255],
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
            'nama_dokter' => 'Nama Dokter',
        ];
    }
}
