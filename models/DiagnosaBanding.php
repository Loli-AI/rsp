<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosa_banding".
 *
 * @property int $id
 * @property string|null $diagnosa
 * @property string|null $pasien_id
 * @property string|null $diagnosa_id
 */
class DiagnosaBanding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosa_banding';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosa', 'pasien_id', 'diagnosa_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diagnosa' => 'Diagnosa',
            'pasien_id' => 'Pasien ID',
            'diagnosa_id' => 'Diagnosa ID',
        ];
    }
}
