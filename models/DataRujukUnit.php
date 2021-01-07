<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_rujuk_unit".
 *
 * @property int $id
 * @property string|null $tgl
 * @property string|null $unit
 * @property string|null $dokter
 * @property string|null $dokter_tujuan
 * @property string|null $keterangan
 * @property int|null $pasien_id
 */
class DataRujukUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_rujuk_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl', 'keterangan'], 'required'],
            [['pasien_id'], 'default'],
            [['pasien_id'], 'integer'],
            [['tgl'], 'safe'],
            [['unit', 'dokter', 'dokter_tujuan', 'keterangan'], 'string', 'max' => 255],
        ];
    }

    /** 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl',
            'unit' => 'Unit',
            'dokter' => 'Dokter',
            'dokter_tujuan' => 'Dokter Tujuan',
            'keterangan' => 'Keterangan',
            'pasien_id' => 'Pasien ID',
        ];
    }
}
