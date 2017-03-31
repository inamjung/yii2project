<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `backend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Customer_id', 'Mobile_No', 'phone_No'], 'integer'],
            [['Name', 'Address', 'Address2', 'City', 'Contact', 'PostCode', 'Email', 'Country', 'VAT_Registration_No', 'duplicate_billing_adds', 'BillingAddress', 'BillingAddres2', 'BillingAddressDistrict', 'BillingAddressCity', 'BillingPostCode', 'duplicate_shipto_adds', 'ShipToAddress', 'ShiptoAddress2', 'ShiptoDistrict'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Customer_id' => $this->Customer_id,
            'Mobile_No' => $this->Mobile_No,
            'phone_No' => $this->phone_No,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Address2', $this->Address2])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'Contact', $this->Contact])
            ->andFilterWhere(['like', 'PostCode', $this->PostCode])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'VAT_Registration_No', $this->VAT_Registration_No])
            ->andFilterWhere(['like', 'duplicate_billing_adds', $this->duplicate_billing_adds])
            ->andFilterWhere(['like', 'BillingAddress', $this->BillingAddress])
            ->andFilterWhere(['like', 'BillingAddres2', $this->BillingAddres2])
            ->andFilterWhere(['like', 'BillingAddressDistrict', $this->BillingAddressDistrict])
            ->andFilterWhere(['like', 'BillingAddressCity', $this->BillingAddressCity])
            ->andFilterWhere(['like', 'BillingPostCode', $this->BillingPostCode])
            ->andFilterWhere(['like', 'duplicate_shipto_adds', $this->duplicate_shipto_adds])
            ->andFilterWhere(['like', 'ShipToAddress', $this->ShipToAddress])
            ->andFilterWhere(['like', 'ShiptoAddress2', $this->ShiptoAddress2])
            ->andFilterWhere(['like', 'ShiptoDistrict', $this->ShiptoDistrict]);

        return $dataProvider;
    }
}
