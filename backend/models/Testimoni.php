<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "testimoni".
 *
 * @property integer $testi_id
 * @property string $testi_nama
 * @property string $testi_quote
 * @property string $testi_gambar
 */
class Testimoni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimoni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testi_nama', 'testi_quote', 'testi_gambar'], 'required'],
            [['testi_nama'], 'string', 'max' => 100],
            [['testi_quote', 'testi_gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'testi_id' => 'Testi ID',
            'testi_nama' => 'Testi Nama',
            'testi_quote' => 'Testi Quote',
            'testi_gambar' => 'Testi Gambar',
        ];
    }
}
