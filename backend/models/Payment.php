<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $Payment_id
 * @property string $Order_No
 * @property integer $Line_No
 * @property string $Payment_Method_Code
 * @property string $Payment_Amount
 * @property string $Card_No
 * @property string $Card_Expire_Date
 * @property string $Ref_No_1
 * @property string $Ref_No_2
 * @property integer $Is_Credit_Card
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Line_No', 'Is_Credit_Card'], 'integer'],
            [['Ref_No_1', 'Ref_No_2'], 'string'],
            [['Order_No'], 'string', 'max' => 20],
            [['Payment_Method_Code'], 'string', 'max' => 10],
            [['Payment_Amount', 'Card_No'], 'string', 'max' => 30],
            [['Card_Expire_Date'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Payment_id' => 'Payment ID',
            'Order_No' => 'Order  No',
            'Line_No' => 'Line  No',
            'Payment_Method_Code' => 'Payment  Method  Code',
            'Payment_Amount' => 'Payment  Amount',
            'Card_No' => 'Card  No',
            'Card_Expire_Date' => 'Card  Expire  Date',
            'Ref_No_1' => 'Ref  No 1',
            'Ref_No_2' => 'Ref  No 2',
            'Is_Credit_Card' => 'Is  Credit  Card',
        ];
    }
}
