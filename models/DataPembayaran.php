<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pembayaran".
 *
 * @property string|null $tgl
 * @property string|null $no_bukti
 * @property string|null $jumlah
 * @property string|null $status
 * @property string|null $terima_dari
 * @property int|null $pasien_id
 * @property int $id
 */
class DataPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id'], 'default', 'value' => null],
            [['pasien_id'], 'integer'],
            [['tgl', 'no_bukti', 'jumlah', 'status', 'terima_dari'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tgl' => 'Tgl',
            'no_bukti' => 'No Bukti',
            'jumlah' => 'Jumlah',
            'status' => 'Status',
            'terima_dari' => 'Terima Dari',
            'pasien_id' => 'Pasien ID',
            'id' => 'ID',
        ];
    }
}
