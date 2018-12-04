<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property string $KATEGORI_ID
 * @property string $KATEGORI_NAMA
 * @property string $KATEGORI_DISKRIPSI
 *
 * @property Katalog[] $katalogs
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KATEGORI_ID', 'KATEGORI_NAMA', 'KATEGORI_DISKRIPSI'], 'required'],
            [['KATEGORI_ID'], 'string', 'max' => 20],
            [['KATEGORI_NAMA'], 'string', 'max' => 200],
            [['KATEGORI_DISKRIPSI'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KATEGORI_ID' => 'Kategori ID',
            'KATEGORI_NAMA' => 'Nama Kategori',
            'KATEGORI_DISKRIPSI' => 'Diskripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatalogs()
    {
        return $this->hasMany(Katalog::className(), ['KATEGORI_ID' => 'KATEGORI_ID']);
    }
}
