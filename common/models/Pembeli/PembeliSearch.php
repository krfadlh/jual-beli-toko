<?php

namespace common\models\Pembeli;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pembeli\Pembeli;

/**
 * PembeliSearch represents the model behind the search form of `common\models\Pembeli\Pembeli`.
 */
class PembeliSearch extends Pembeli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'nama_pembeli', 'alamat'], 'safe'],
            [['no_telp'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pembeli::find();

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
            'no_telp' => $this->no_telp,
        ]);

        $query->andFilterWhere(['like', 'id_pembeli', $this->id_pembeli])
            ->andFilterWhere(['like', 'nama_pembeli', $this->nama_pembeli])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
