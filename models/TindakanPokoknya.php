<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan_pokoknya".
 *
 * @property string $pasien_id
 * @property int $id
 * @property string|null $tanggal
 * @property string|null $tindakan
 * @property string|null $kelas
 * @property int|null $biaya
 * @property int|null $jumlah
 * @property int|null $subtotal
 * @property string|null $dokter
 * @property string|null $keterangan
 * @property string|null $petugas_input
 */
class TindakanPokoknya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan_pokoknya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'id'], 'required'],
            [['id', 'biaya', 'jumlah', 'subtotal'], 'default', 'value' => null],
            [['id', 'biaya', 'jumlah', 'subtotal'], 'integer'],
            [['tanggal'], 'safe'],
            [['pasien_id'], 'string', 'max' => 30],
            [['tindakan', 'kelas', 'dokter', 'keterangan', 'petugas_input'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pasien_id' => 'Pasien ID',
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'tindakan' => 'Tindakan',
            'kelas' => 'Kelas',
            'biaya' => 'Biaya',
            'jumlah' => 'Jumlah',
            'subtotal' => 'Subtotal',
            'dokter' => 'Dokter',
            'keterangan' => 'Keterangan',
            'petugas_input' => 'Petugas Input',
        ];
    }
}
