<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $Customer_id
 * @property string $Name
 * @property string $Address
 * @property string $Address2
 * @property string $City
 * @property string $Contact
 * @property integer $Mobile_No
 * @property integer $phone_No
 * @property string $PostCode
 * @property string $Email
 * @property string $Country
 * @property string $VAT_Registration_No
 * @property string $duplicate_billing_adds
 * @property string $BillingAddress
 * @property string $BillingAddres2
 * @property string $BillingAddressDistrict
 * @property string $BillingAddressCity
 * @property string $BillingPostCode
 * @property string $duplicate_shipto_adds
 * @property string $ShipToAddress
 * @property string $ShiptoAddress2
 * @property string $ShiptoDistrict
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address', 'Address2', 'City', 'Contact', 'Country', 'duplicate_billing_adds', 'BillingAddress', 'BillingAddres2', 'BillingAddressDistrict', 'BillingAddressCity', 'BillingPostCode', 'duplicate_shipto_adds', 'ShipToAddress', 'ShiptoAddress2', 'ShiptoDistrict'], 'string'],
            [['Mobile_No', 'phone_No'], 'integer'],
            [['Name', 'VAT_Registration_No'], 'string', 'max' => 50],
            [['PostCode'], 'string', 'max' => 20],
            [['Email'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Customer_id' => 'Customer ID',
            'Name' => 'Name',
            'Address' => 'Address',
            'Address2' => 'Address2',
            'City' => 'City',
            'Contact' => 'Contact',
            'Mobile_No' => 'Mobile  No',
            'phone_No' => 'Phone  No',
            'PostCode' => 'Post Code',
            'Email' => 'Email',
            'Country' => 'Country',
            'VAT_Registration_No' => 'Vat  Registration  No',
            'duplicate_billing_adds' => 'Duplicate Billing Adds',
            'BillingAddress' => 'Billing Address',
            'BillingAddres2' => 'Billing Addres2',
            'BillingAddressDistrict' => 'Billing Address District',
            'BillingAddressCity' => 'Billing Address City',
            'BillingPostCode' => 'Billing Post Code',
            'duplicate_shipto_adds' => 'Duplicate Shipto Adds',
            'ShipToAddress' => 'Ship To Address',
            'ShiptoAddress2' => 'Shipto Address2',
            'ShiptoDistrict' => 'Shipto District',
        ];
    }
}
