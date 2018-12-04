<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailorder".
 *
 * @property string $ORDER_ID
 * @property integer $KATALOG_ID
 * @property integer $DETAILORDER_ID
 * @property integer $DETAILORDER_QTY
 * @property integer $DETAILORDER_JUMLAH
 *
 * @property Katalog $kATALOG
 * @property Masterorder $oRDER
 */
class Detailorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'KATALOG_ID', 'DETAILORDER_QTY', 'DETAILORDER_JUMLAH'], 'required'],
            [['DETAILORDER_ID','KATALOG_ID', 'DETAILORDER_QTY', 'DETAILORDER_JUMLAH'], 'integer'],
            [['ORDER_ID', 'DETAILORDER_ID'], 'string', 'max' => 20],
            [['KATALOG_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Katalog::className(), 'targetAttribute' => ['KATALOG_ID' => 'KATALOG_ID']],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Masterorder::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => 'Order Id',
            'KATALOG_ID' => 'Id Katalog',
            'DETAILORDER_ID' => 'Detailorder Id',
            'DETAILORDER_QTY' => 'Qty Detailorder',
            'DETAILORDER_JUMLAH' => 'Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKATALOG()
    {
        return $this->hasOne(Katalog::className(), ['KATALOG_ID' => 'KATALOG_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDER()
    {
        return $this->hasOne(Masterorder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
