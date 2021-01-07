<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retribusi".
 *
 * @property int $id
 * @property string|null $retribusi
 */
class Retribusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retribusi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['retribusi'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'retribusi' => 'Retribusi',
        ];
    }
}
