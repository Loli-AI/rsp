<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gol_darah".
 *
 * @property float $id
 * @property string|null $darah
 */
class GolDarah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gol_darah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'number'],
            [['darah'], 'string'],
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
            'darah' => 'Darah',
        ];
    }
}
