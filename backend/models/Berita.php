<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $berita_id
 * @property string $berita_judul
 * @property string $berita_isi
 * @property string $berita_gambar
 * @property string $berita_tgl
 * @property integer $berita_counter
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_judul', 'berita_isi'], 'required'],
            [['berita_isi'], 'string'],
            [['berita_tgl'], 'safe'],
            [['berita_counter'], 'integer'],
            [['berita_judul'], 'string', 'max' => 100],
            [['berita_gambar'], 'string', 'max' => 255],
            [['berita_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'berita_id' => 'Berita',
            'berita_judul' => 'Judul Berita',
            'berita_isi' => 'Isi Berita',
            'berita_gambar' => 'Gambar',
            'berita_tgl' => 'Tanggal',
            'berita_counter' => 'Counter',
            'berita_link' => 'Link',
        ];
    }
}
