<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderheader".
 *
 * @property integer $id
 * @property string $Order_No
 * @property integer $Order_id
 * @property string $Customer
 * @property string $Salesperson_Code
 * @property string $Salesperson_Name
 * @property string $Store_No
 * @property string $Event_Code
 * @property string $Brand_Code
 * @property integer $Cash_and_Carry
 * @property string $Delivery_Next_Day
 * @property integer $Partially_Ship
 * @property string $Create_By_User_ID
 * @property integer $customer_id
 */
class Orderheader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderheader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Order_No', 'Order_id'], 'required'],
            [['Order_id', 'Cash_and_Carry', 'Partially_Ship', 'customer_id'], 'integer'],
            [['Salesperson_Name'], 'string'],
            [['Delivery_Next_Day'], 'safe'],
            [['Order_No', 'Event_Code', 'Brand_Code'], 'string', 'max' => 20],
            [['Customer'], 'string', 'max' => 255],
            [['Salesperson_Code', 'Create_By_User_ID'], 'string', 'max' => 50],
            [['Store_No'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Order_No' => 'Order  No',
            'Order_id' => 'Order ID',
            'Customer' => 'Customer',
            'Salesperson_Code' => 'Salesperson  Code',
            'Salesperson_Name' => 'Salesperson  Name',
            'Store_No' => 'Store  No',
            'Event_Code' => 'Event  Code',
            'Brand_Code' => 'Brand  Code',
            'Cash_and_Carry' => 'Cash And  Carry',
            'Delivery_Next_Day' => 'Delivery  Next  Day',
            'Partially_Ship' => 'Partially  Ship',
            'Create_By_User_ID' => 'Create  By  User  ID',
            'customer_id' => 'Customer ID',
        ];
    }
    public function getOrderlist(){
        return $this->hasMany(Orderline::className(), ['Order_hearder_id'=>'id']);
    }
}
