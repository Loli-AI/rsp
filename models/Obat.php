<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "a_obat".
 *
 * @property int $OBAT_ID
 * @property string|null $OBAT_KODE
 * @property string|null $OBAT_KODE_ASKES
 * @property string $OBAT_NAMA
 * @property string|null $OBAT_NAMA_GENERIK
 * @property int|null $PABRIK_ID
 * @property string|null $PABRIK_KODE
 * @property int|null $KEPEMILIKAN_ID
 * @property int|null $JENIS_OBAT_ID
 * @property int|null $SUBJENIS_OBAT_ID
 * @property string|null $OBAT_DOSIS
 * @property string|null $OBAT_SATUAN_BESAR
 * @property string|null $OBAT_SATUAN_KECIL
 * @property float|null $ISI_SATUAN_KECIL
 * @property string|null $OBAT_BENTUK
 * @property int|null $KLS_ID
 * @property int|null $OBAT_KATEGORI 0=GENERIK, 1=PATENT
 * @property int|null $OBAT_KELOMPOK
 * @property string|null $OBAT_GOLONGAN N:NARKOTIKA,P:PETHIDINE,MORPHINE,Psi:PSIKOTROPIKA
 * @property int|null $HABIS_PAKAI 0=TDK HABIS PAKAI, 1=HABIS PAKAI
 * @property string|null $ID_PATEN
 * @property string|null $KODE_PATEN
 * @property int|null $OBAT_ISAKTIF
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'a_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OBAT_ID', 'OBAT_NAMA'], 'required'],
            [['OBAT_ID', 'PABRIK_ID', 'KEPEMILIKAN_ID', 'JENIS_OBAT_ID', 'SUBJENIS_OBAT_ID', 'KLS_ID', 'OBAT_KATEGORI', 'OBAT_KELOMPOK', 'HABIS_PAKAI', 'OBAT_ISAKTIF'], 'default', 'value' => null],
            [['OBAT_ID', 'PABRIK_ID', 'KEPEMILIKAN_ID', 'JENIS_OBAT_ID', 'SUBJENIS_OBAT_ID', 'KLS_ID', 'OBAT_KATEGORI', 'OBAT_KELOMPOK', 'HABIS_PAKAI', 'OBAT_ISAKTIF'], 'integer'],
            [['ISI_SATUAN_KECIL'], 'number'],
            [['OBAT_KODE', 'OBAT_KODE_ASKES', 'OBAT_BENTUK'], 'string', 'max' => 30],
            [['OBAT_NAMA', 'OBAT_NAMA_GENERIK', 'KODE_PATEN'], 'string', 'max' => 100],
            [['PABRIK_KODE'], 'string', 'max' => 10],
            [['OBAT_DOSIS', 'ID_PATEN'], 'string', 'max' => 75],
            [['OBAT_SATUAN_BESAR', 'OBAT_SATUAN_KECIL'], 'string', 'max' => 50],
            [['OBAT_GOLONGAN'], 'string', 'max' => 5],
            [['OBAT_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'OBAT_ID' => 'Obat ID',
            'OBAT_KODE' => 'Obat Kode',
            'OBAT_KODE_ASKES' => 'Obat Kode Askes',
            'OBAT_NAMA' => 'Obat Nama',
            'OBAT_NAMA_GENERIK' => 'Obat Nama Generik',
            'PABRIK_ID' => 'Pabrik ID',
            'PABRIK_KODE' => 'Pabrik Kode',
            'KEPEMILIKAN_ID' => 'Kepemilikan ID',
            'JENIS_OBAT_ID' => 'Jenis Obat ID',
            'SUBJENIS_OBAT_ID' => 'Subjenis Obat ID',
            'OBAT_DOSIS' => 'Obat Dosis',
            'OBAT_SATUAN_BESAR' => 'Obat Satuan Besar',
            'OBAT_SATUAN_KECIL' => 'Obat Satuan Kecil',
            'ISI_SATUAN_KECIL' => 'Isi Satuan Kecil',
            'OBAT_BENTUK' => 'Obat Bentuk',
            'KLS_ID' => 'Kls ID',
            'OBAT_KATEGORI' => 'Obat Kategori',
            'OBAT_KELOMPOK' => 'Obat Kelompok',
            'OBAT_GOLONGAN' => 'Obat Golongan',
            'HABIS_PAKAI' => 'Habis Pakai',
            'ID_PATEN' => 'Id Paten',
            'KODE_PATEN' => 'Kode Paten',
            'OBAT_ISAKTIF' => 'Obat Isaktif',
        ];
    }
}
