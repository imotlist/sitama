<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jenisbarang".
 *
 * @property string $JENIS_BARANG_ID
 * @property string $JENIS_BARANG_NAMA
 * @property string $KETERANGAN
 *
 * @property Katalog[] $katalogs
 */
class JenisBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenisbarang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JENIS_BARANG_ID', 'JENIS_BARANG_NAMA'], 'required'],
            [['JENIS_BARANG_ID'], 'string', 'max' => 20],
            [['JENIS_BARANG_NAMA'], 'string', 'max' => 100],
            [['KETERANGAN'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JENIS_BARANG_ID' => 'Id Jenis Barang',
            'JENIS_BARANG_NAMA' => 'Nama Jenis Barang',
            'KETERANGAN' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatalogs()
    {
        return $this->hasMany(Katalog::className(), ['JENIS_BARANG_ID' => 'JENIS_BARANG_ID']);
    }
}
