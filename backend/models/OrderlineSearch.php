<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orderline;

/**
 * OrderlineSearch represents the model behind the search form about `backend\models\Orderline`.
 */
class OrderlineSearch extends Orderline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Order_id', 'Order_hearder_id', 'Line_No', 'Install'], 'integer'],
            [['Order_No', 'Item_No', 'Description', 'Get_Back', 'Deliver_Date', 'status'], 'safe'],
            [['Quantity', 'Price', 'Amout'], 'number'],
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
        $query = Orderline::find();

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
            'Order_hearder_id' => $this->Order_hearder_id,
            'Line_No' => $this->Line_No,
            'Quantity' => $this->Quantity,
            'Price' => $this->Price,
            'Amout' => $this->Amout,
            'Deliver_Date' => $this->Deliver_Date,
            'Install' => $this->Install,
        ]);

        $query->andFilterWhere(['like', 'Order_No', $this->Order_No])
            ->andFilterWhere(['like', 'Item_No', $this->Item_No])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Get_Back', $this->Get_Back])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
