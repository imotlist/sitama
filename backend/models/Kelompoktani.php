<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kelompoktani".
 *
 * @property string $KELOMPOKTANI_ID
 * @property string $KELOMPOKTANI_NAMA
 * @property string $KELOMPOKTANI_DESA
 * @property integer $KELOMPOKTANI_STATUS
 *
 * @property User[] $users
 */
class Kelompoktani extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelompoktani';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KELOMPOKTANI_ID', 'KELOMPOKTANI_NAMA', 'KELOMPOKTANI_DESA', 'KELOMPOKTANI_STATUS'], 'required'],
            [['KELOMPOKTANI_STATUS'], 'integer'],
            [['KELOMPOKTANI_ID'], 'string', 'max' => 20],
            [['KELOMPOKTANI_NAMA', 'KELOMPOKTANI_DESA'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KELOMPOKTANI_ID' => 'Kelompoktani ID',
            'KELOMPOKTANI_NAMA' => 'Nama',
            'KELOMPOKTANI_DESA' => 'Desa',
            'KELOMPOKTANI_STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['KELOMPOKTANI_ID' => 'KELOMPOKTANI_ID']);
    }
}
