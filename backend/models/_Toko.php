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
 * @property integer $TOKO_STATUS
 *
 * @property Katalog[] $katalogs
 * @property User $iD
 * @property User[] $users
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
            [['TOKO_ID', 'ID', 'TOKO_NAMA', 'TOKO_ALAMAT', 'TOKO_TELP', 'TOKO_DISKRIPSI', 'TOKO_STATUS','NO_REK','ATAS_NAMA','NAMA_BANK'], 'required'],
            [['ID', 'TOKO_STATUS'], 'integer'],
            [['TOKO_DISKRIPSI','NO_REK','ATAS_NAMA','NAMA_BANK'], 'string'],
            [['TOKO_ID', 'TOKO_TELP'], 'string', 'max' => 20],
            [['TOKO_NAMA'], 'string', 'max' => 200],
            [['TOKO_ALAMAT'], 'string', 'max' => 255],
            [['TOKO_FOTO'], 'file'],
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
            'TOKO_NAMA' => 'Toko  Nama',
            'TOKO_ALAMAT' => 'Toko  Alamat',
            'TOKO_TELP' => 'Toko  Telp',
            'TOKO_DISKRIPSI' => 'Toko  Diskripsi',
            'TOKO_STATUS' => 'Toko  Status',
            'TOKO_FOTO' => 'Foto Toko',
            'NAMA_BANK' => 'Nama Bank',
            'ATAS_NAMA' => 'Atas Nama',
            'NO_REK' => 'No Rek',
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
    public function getID()
    {
        return $this->hasOne(User::className(), ['id' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['TOKO_ID' => 'TOKO_ID']);
    }
}
