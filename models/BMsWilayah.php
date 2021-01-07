<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_ms_wilayah".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $kode_siak
 * @property string|null $nama
 * @property int|null $level
 * @property int|null $parent_id
 * @property string|null $parent_kode
 * @property int|null $aktif
 * @property string|null $kowil
 * @property string|null $flag
 */
class BMsWilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b_ms_wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'level', 'parent_id', 'aktif'], 'default', 'value' => null],
            [['id', 'level', 'parent_id', 'aktif'], 'integer'],
            [['kode', 'nama', 'parent_kode'], 'string', 'max' => 50],
            [['kode_siak'], 'string', 'max' => 20],
            [['kowil'], 'string', 'max' => 10],
            [['flag'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'kode_siak' => 'Kode Siak',
            'nama' => 'Nama',
            'level' => 'Level',
            'parent_id' => 'Parent ID',
            'parent_kode' => 'Parent Kode',
            'aktif' => 'Aktif',
            'kowil' => 'Kowil',
            'flag' => 'Flag',
        ];
    }
}
