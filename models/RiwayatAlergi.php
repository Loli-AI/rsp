<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_alergi".
 *
 * @property int $id
 * @property string|null $tgl
 * @property string|null $pasien_id
 * @property string|null $alergi
 */
class RiwayatAlergi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_alergi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl'], 'safe'],
            [['pasien_id', 'alergi'], 'string'],
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
            'pasien_id' => 'Pasien ID',
            'alergi' => 'Alergi',
        ];
    }
}
