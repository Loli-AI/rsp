<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_penjamin_pasien".
 *
 * @property int $id
 * @property string|null $status_penjamin_pasien
 */
class StatusPenjaminPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_penjamin_pasien';
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
            [['status_penjamin_pasien'], 'string', 'max' => 255],
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
            'status_penjamin_pasien' => 'Status Penjamin Pasien',
        ];
    }
}
