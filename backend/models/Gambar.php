<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gambar".
 *
 * @property string $gambar_id
 * @property string $gambar_nama
 * @property string $gambar_file
 * @property string $gambar_ket
 * @property string $gambar_stat
 */
class Gambar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gambar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gambar_id', 'gambar_nama', 'gambar_file', 'gambar_ket', 'gambar_stat'], 'required'],
            [['gambar_id', 'gambar_stat'], 'string', 'max' => 10],
            [['gambar_nama'], 'string', 'max' => 100],
            [['gambar_ket'], 'string', 'max' => 255],
            [['gambar_file'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gambar_id' => 'Gambar ID',
            'gambar_nama' => 'Gambar Nama',
            'gambar_file' => 'Gambar File',
            'gambar_ket' => 'Gambar Ket',
            'gambar_stat' => 'Gambar Stat',
        ];
    }
}
