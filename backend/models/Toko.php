<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "toko".
 *
 * @property string $TOKO_ID
 * @property integer $ID
 * @property string $TOKO_NAMA
 * @property string $TOKO_ALAMAT
 * @property string $TOKO_TELP
 * @property string $TOKO_DISKRIPSI
 * @property string $TOKO_FOTO
 * @property integer $TOKO_STATUS
 * @property string $NAMA_BANK
 * @property string $ATAS_NAMA
 * @property string $NO_REK
 * @property string $DAERAH_ID
 *
 * @property Katalog[] $katalogs
 * @property Daerah $dAERAH
 * @property User $iD
 */
class Toko extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'toko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TOKO_ID', 'ID', 'TOKO_NAMA', 'TOKO_ALAMAT', 'TOKO_TELP', 'TOKO_DISKRIPSI', 'TOKO_FOTO', 'TOKO_STATUS', 'NAMA_BANK', 'ATAS_NAMA', 'NO_REK', 'DAERAH_ID'], 'required'],
            [['ID', 'TOKO_STATUS'], 'integer'],
            [['TOKO_DISKRIPSI'], 'string'],
            [['TOKO_ID', 'TOKO_TELP'], 'string', 'max' => 20],
            [['TOKO_NAMA'], 'string', 'max' => 200],
            [['TOKO_ALAMAT', 'ATAS_NAMA','location'], 'string', 'max' => 255],
            [['TOKO_FOTO', 'NAMA_BANK', 'NO_REK'], 'string', 'max' => 100],
            [['DAERAH_ID'], 'string', 'max' => 10],
            [['DAERAH_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Daerah::className(), 'targetAttribute' => ['DAERAH_ID' => 'DAERAH_ID']],
            [['ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TOKO_ID' => 'Toko  ID',
            'ID' => 'ID',
            'TOKO_NAMA' => 'Nama Toko',
            'TOKO_ALAMAT' => 'Alamat',
            'TOKO_TELP' => 'Telp',
            'TOKO_DISKRIPSI' => 'Diskripsi',
            'TOKO_FOTO' => 'Foto',
            'TOKO_STATUS' => 'Status',
            'NAMA_BANK' => 'Nama Bank',
            'ATAS_NAMA' => 'Atas Nama',
            'NO_REK' => 'No Rek',
            'DAERAH_ID' => 'Daerah',
            'location' => 'Lokasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatalogs()
    {
        return $this->hasMany(Katalog::className(), ['TOKO_ID' => 'TOKO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDAERAH()
    {
        return $this->hasOne(Daerah::className(), ['DAERAH_ID' => 'DAERAH_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getID()
    {
        return $this->hasOne(User::className(), ['id' => 'ID']);
    }
}
