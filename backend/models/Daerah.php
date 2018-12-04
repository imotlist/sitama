<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daerah".
 *
 * @property string $DAERAH_ID
 * @property string $DAERAH_NAMA
 *
 * @property Toko[] $tokos
 */
class Daerah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daerah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DAERAH_ID', 'DAERAH_NAMA'], 'required'],
            [['DAERAH_ID'], 'string', 'max' => 10],
            [['DAERAH_NAMA'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DAERAH_ID' => 'Daerah',
            'DAERAH_NAMA' => 'Nama Daerah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokos()
    {
        return $this->hasMany(Toko::className(), ['DAERAH_ID' => 'DAERAH_ID']);
    }
}
