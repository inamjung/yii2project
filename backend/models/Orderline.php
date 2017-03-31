<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderline".
 *
 * @property integer $id
 * @property integer $Order_id
 * @property integer $Order_hearder_id
 * @property string $Order_No
 * @property integer $Line_No
 * @property string $Item_No
 * @property string $Description
 * @property string $Get_Back
 * @property string $Quantity
 * @property string $Price
 * @property string $Amout
 * @property string $Deliver_Date
 * @property integer $Install
 * @property string $status
 */
class Orderline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';
 

    private $_updateType;

    public function getUpdateType()
    {
        if (empty($this->_updateType)) {
          if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else 
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
       
        return $this->_updateType;
    }
    

    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }
    public static function tableName()
    {
        return 'orderline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE,  self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE]
            ,
            [['Order_id', 'status'], 'required'],
            [['Order_id', 'Order_hearder_id', 'Line_No', 'Install'], 'integer'],
            [['Description', 'Get_Back', 'status'], 'string'],
            [['Quantity', 'Price', 'Amout'], 'number'],
            [['Deliver_Date'], 'safe'],
            [['Order_No', 'Item_No'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Order_id' => 'Order ID',
            'Order_hearder_id' => 'Order Hearder ID',
            'Order_No' => 'Order  No',
            'Line_No' => 'Line  No',
            'Item_No' => 'Item  No',
            'Description' => 'Description',
            'Get_Back' => 'Get  Back',
            'Quantity' => 'Quantity',
            'Price' => 'Price',
            'Amout' => 'Amout',
            'Deliver_Date' => 'Deliver  Date',
            'Install' => 'Install',
            'status' => 'Status',
        ];
    }
}
