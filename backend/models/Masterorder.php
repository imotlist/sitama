<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "masterorder".
 *
 * @property string $ORDER_ID
 * @property integer $ID
 * @property string $ORDER_TGL_ADD
 * @property string $ORDER_TGL_EXP
 * @property integer $ORDER_STATUS
 *
 * @property Detailorder[] $detailorders
 * @property User $iD
 */
class Masterorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'ID'], 'required'],
            [['ID', 'ORDER_STATUS'], 'integer'],
            [['ORDER_TGL_ADD', 'ORDER_TGL_EXP'], 'safe'],
            [['ORDER_ID'], 'string', 'max' => 20],
            [['BUKTI'], 'file'],
            [['ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => 'Order  ID',
            'ID' => 'ID',
            'ORDER_TGL_ADD' => 'Order  Tgl  Add',
            'ORDER_TGL_EXP' => 'Order  Tgl  Exp',
            'ORDER_STATUS' => 'Order  Status',
            'BUKTI' => 'Bukti Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailorders()
    {
        return $this->hasMany(Detailorder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getID()
    {
        return $this->hasOne(User::className(), ['id' => 'ID']);
    }
}
