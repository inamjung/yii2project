<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orderheader;

/**
 * OrderheaderSearch represents the model behind the search form about `backend\models\Orderheader`.
 */
class OrderheaderSearch extends Orderheader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Order_id', 'Cash_and_Carry', 'Partially_Ship', 'customer_id'], 'integer'],
            [['Order_No', 'Customer', 'Salesperson_Code', 'Salesperson_Name', 'Store_No', 'Event_Code', 'Brand_Code', 'Delivery_Next_Day', 'Create_By_User_ID'], 'safe'],
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
        $query = Orderheader::find();

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
            'id' => $this->id,
            'Order_id' => $this->Order_id,
            'Cash_and_Carry' => $this->Cash_and_Carry,
            'Delivery_Next_Day' => $this->Delivery_Next_Day,
            'Partially_Ship' => $this->Partially_Ship,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'Order_No', $this->Order_No])
            ->andFilterWhere(['like', 'Customer', $this->Customer])
            ->andFilterWhere(['like', 'Salesperson_Code', $this->Salesperson_Code])
            ->andFilterWhere(['like', 'Salesperson_Name', $this->Salesperson_Name])
            ->andFilterWhere(['like', 'Store_No', $this->Store_No])
            ->andFilterWhere(['like', 'Event_Code', $this->Event_Code])
            ->andFilterWhere(['like', 'Brand_Code', $this->Brand_Code])
            ->andFilterWhere(['like', 'Create_By_User_ID', $this->Create_By_User_ID]);

        return $dataProvider;
    }
}
