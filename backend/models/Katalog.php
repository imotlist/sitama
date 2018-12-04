<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "katalog".
 *
 * @property integer $KATALOG_ID
 * @property string $KATEGORI_ID
 * @property string $TOKO_ID
 * @property string $JENIS_BARANG_ID
 * @property string $KATALOG_JUDUL
 * @property string $KATALOG_BARANG
 * @property integer $KATALOG_HARGA
 * @property string $KATALOG_TGL_POST
 * @property string $KATALOG_DISKRIPSI
 * @property integer $KATALOG_STATUS
 *
 * @property Detailorder[] $detailorders
 * @property Toko $tOKO
 * @property Jenisbarang $jENISBARANG
 * @property Kategori $kATEGORI
 */
class Katalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'katalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KATEGORI_ID', 'TOKO_ID', 'JENIS_BARANG_ID', 'KATALOG_JUDUL', 'KATALOG_BARANG', 'KATALOG_HARGA', 'KATALOG_DISKRIPSI', 'KATALOG_STATUS'], 'required'],
            [['KATALOG_ID', 'KATALOG_HARGA', 'KATALOG_STATUS'], 'integer'],
            [['KATALOG_TGL_POST'], 'safe'],
            [['KATEGORI_ID', 'TOKO_ID', 'JENIS_BARANG_ID'], 'string', 'max' => 20],
            [['KATALOG_JUDUL', 'KATALOG_BARANG'], 'string', 'max' => 200],
            [['TOKO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Toko::className(), 'targetAttribute' => ['TOKO_ID' => 'TOKO_ID']],
            [['JENIS_BARANG_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Jenisbarang::className(), 'targetAttribute' => ['JENIS_BARANG_ID' => 'JENIS_BARANG_ID']],
            [['KATEGORI_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['KATEGORI_ID' => 'KATEGORI_ID']],
            [['GAMBAR'],'file'],
            [['STOK'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KATALOG_ID' => 'Kode Barang',
            'KATEGORI_ID' => 'Kategori',
            'TOKO_ID' => 'Toko',
            'JENIS_BARANG_ID' => 'Jenis  Barang',
            'KATALOG_JUDUL' => 'Judul Post',
            'KATALOG_BARANG' => 'Barang',
            'KATALOG_HARGA' => 'Harga',
            'KATALOG_TGL_POST' => 'Tgl Post',
            'KATALOG_DISKRIPSI' => 'Diskripsi',
            'KATALOG_STATUS' => 'Status',
            'GAMBAR' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailorders()
    {
        return $this->hasMany(Detailorder::className(), ['KATALOG_ID' => 'KATALOG_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTOKO()
    {
        return $this->hasOne(Toko::className(), ['TOKO_ID' => 'TOKO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJENISBARANG()
    {
        return $this->hasOne(Jenisbarang::className(), ['JENIS_BARANG_ID' => 'JENIS_BARANG_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKATEGORI()
    {
        return $this->hasOne(Kategori::className(), ['KATEGORI_ID' => 'KATEGORI_ID']);
    }
}
