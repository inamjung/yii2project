<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `backend\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Payment_id', 'Line_No', 'Is_Credit_Card'], 'integer'],
            [['Order_No', 'Payment_Method_Code', 'Payment_Amount', 'Card_No', 'Card_Expire_Date', 'Ref_No_1', 'Ref_No_2'], 'safe'],
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
        $query = Payment::find();

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
            'Payment_id' => $this->Payment_id,
            'Line_No' => $this->Line_No,
            'Is_Credit_Card' => $this->Is_Credit_Card,
        ]);

        $query->andFilterWhere(['like', 'Order_No', $this->Order_No])
            ->andFilterWhere(['like', 'Payment_Method_Code', $this->Payment_Method_Code])
            ->andFilterWhere(['like', 'Payment_Amount', $this->Payment_Amount])
            ->andFilterWhere(['like', 'Card_No', $this->Card_No])
            ->andFilterWhere(['like', 'Card_Expire_Date', $this->Card_Expire_Date])
            ->andFilterWhere(['like', 'Ref_No_1', $this->Ref_No_1])
            ->andFilterWhere(['like', 'Ref_No_2', $this->Ref_No_2]);

        return $dataProvider;
    }
}
