<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_ms_diagnosa".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 * @property int|null $level
 * @property string|null $nama_idn
 * @property int|null $parent_id
 * @property string|null $parent_kode
 * @property int|null $surveilance
 * @property int|null $islast
 * @property int|null $aktif
 * @property string|null $dg_kode
 * @property int|null $kdg_id
 * @property int|null $surveilens_id
 * @property int|null $degger
 * @property string|null $flag
 */
class BMsDiagnosa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b_ms_diagnosa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'level', 'parent_id', 'surveilance', 'islast', 'aktif', 'kdg_id', 'surveilens_id', 'degger'], 'default', 'value' => null],
            [['id', 'level', 'parent_id', 'surveilance', 'islast', 'aktif', 'kdg_id', 'surveilens_id', 'degger'], 'integer'],
            [['kode', 'parent_kode'], 'string', 'max' => 15],
            [['nama', 'nama_idn'], 'string', 'max' => 250],
            [['dg_kode'], 'string', 'max' => 10],
            [['flag'], 'string', 'max' => 1],
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
            'kode' => 'Kode',
            'nama' => 'Nama',
            'level' => 'Level',
            'nama_idn' => 'Nama Idn',
            'parent_id' => 'Parent ID',
            'parent_kode' => 'Parent Kode',
            'surveilance' => 'Surveilance',
            'islast' => 'Islast',
            'aktif' => 'Aktif',
            'dg_kode' => 'Dg Kode',
            'kdg_id' => 'Kdg ID',
            'surveilens_id' => 'Surveilens ID',
            'degger' => 'Degger',
            'flag' => 'Flag',
        ];
    }
}
