<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property string $ItemNo
 * @property string $Description
 * @property integer $Variant
 * @property string $SerialNo
 * @property integer $Location
 * @property string $Quantity
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ItemNo', 'Description', 'Variant', 'SerialNo', 'Location', 'Quantity'], 'required'],
            [['Description'], 'string'],
            [['Variant', 'Location'], 'integer'],
            [['Quantity'], 'number'],
            [['ItemNo', 'SerialNo'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ItemNo' => 'Item No',
            'Description' => 'Description',
            'Variant' => 'Variant',
            'SerialNo' => 'Serial No',
            'Location' => 'Location',
            'Quantity' => 'Quantity',
        ];
    }
}
