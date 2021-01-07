<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_ms_tarip_baru".
 *
 * @property int $id
 * @property string|null $Nama_Tindakan
 * @property float|null $tarip_berubah
 * @property float|null $ak_ms_unit_id
 * @property float|null $ext_tind
 * @property float|null $klasifikasi_id
 * @property float|null $kelompok_tind_id
 * @property string|null $kelompok
 * @property float|null $TARIF_UTIP
 * @property float|null $ms_kelas_id1
 * @property float|null $TARIF_NON_KELAS
 * @property float|null $ms_kelas_id2
 * @property string|null $TARIF_KELAS_3
 * @property float|null $ms_kelas_id3
 * @property string|null $TARIF_KELAS_2
 * @property float|null $ms_kelas_id4
 * @property string|null $TARIF_KELAS_1
 * @property float|null $ms_kelas_id5
 * @property string|null $TARIF_KELAS_ICU
 * @property float|null $ms_kelas_id6
 * @property string|null $TARIF_KELAS_VIP
 * @property float|null $ms_kelas_id7
 * @property string|null $TARIF_KELAS_VVIP
 */
class BMsTaripBaru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b_ms_tarip_baru';
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
            [['tarip_berubah', 'ak_ms_unit_id', 'ext_tind', 'klasifikasi_id', 'kelompok_tind_id', 'TARIF_UTIP', 'ms_kelas_id1', 'TARIF_NON_KELAS', 'ms_kelas_id2', 'ms_kelas_id3', 'ms_kelas_id4', 'ms_kelas_id5', 'ms_kelas_id6', 'ms_kelas_id7'], 'number'],
            [['Nama_Tindakan', 'kelompok', 'TARIF_KELAS_3', 'TARIF_KELAS_2', 'TARIF_KELAS_1', 'TARIF_KELAS_ICU', 'TARIF_KELAS_VIP', 'TARIF_KELAS_VVIP'], 'string', 'max' => 255],
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
            'Nama_Tindakan' => 'Nama Tindakan',
            'tarip_berubah' => 'Tarip Berubah',
            'ak_ms_unit_id' => 'Ak Ms Unit ID',
            'ext_tind' => 'Ext Tind',
            'klasifikasi_id' => 'Klasifikasi ID',
            'kelompok_tind_id' => 'Kelompok Tind ID',
            'kelompok' => 'Kelompok',
            'TARIF_UTIP' => 'Tarif Utip',
            'ms_kelas_id1' => 'Ms Kelas Id1',
            'TARIF_NON_KELAS' => 'Tarif Non Kelas',
            'ms_kelas_id2' => 'Ms Kelas Id2',
            'TARIF_KELAS_3' => 'Tarif Kelas 3',
            'ms_kelas_id3' => 'Ms Kelas Id3',
            'TARIF_KELAS_2' => 'Tarif Kelas 2',
            'ms_kelas_id4' => 'Ms Kelas Id4',
            'TARIF_KELAS_1' => 'Tarif Kelas 1',
            'ms_kelas_id5' => 'Ms Kelas Id5',
            'TARIF_KELAS_ICU' => 'Tarif Kelas Icu',
            'ms_kelas_id6' => 'Ms Kelas Id6',
            'TARIF_KELAS_VIP' => 'Tarif Kelas Vip',
            'ms_kelas_id7' => 'Ms Kelas Id7',
            'TARIF_KELAS_VVIP' => 'Tarif Kelas Vvip',
        ];
    }
}
