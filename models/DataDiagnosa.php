<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_diagnosa".
 *
 * @property int $id
 * @property string|null $tgl
 * @property string|null $diagnosa
 * @property string|null $banding
 * @property string|null $dokter
 * @property string|null $prioritas
 * @property string|null $akhir
 * @property string|null $penyebab_kematian
 * @property string|null $klinis
 */
class DataDiagnosa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_diagnosa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl'], 'safe'],
            [['diagnosa', 'banding', 'dokter', 'prioritas', 'akhir', 'penyebab_kematian', 'klinis'], 'string', 'max' => 255],
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
            'diagnosa' => 'Diagnosa',
            'banding' => 'Banding',
            'dokter' => 'Dokter',
            'prioritas' => 'Prioritas',
            'akhir' => 'Akhir',
            'penyebab_kematian' => 'Penyebab Kematian',
            'klinis' => 'Klinis',
        ];
    }
}
