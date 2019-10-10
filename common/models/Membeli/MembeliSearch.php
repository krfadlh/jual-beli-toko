<?php

namespace common\models\Membeli;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Membeli\Membeli;

/**
 * MembeliSearch represents the model behind the search form of `common\models\Membeli\Membeli`.
 */
class MembeliSearch extends Membeli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_pembelian', 'harga_yg_dibayar', 'kode_barang', 'id_pembeli', 'id_transaksi'], 'safe'],
            [['jmlh_barang'], 'integer'],
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
        $query = Membeli::find();

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
            'jmlh_barang' => $this->jmlh_barang,
        ]);

        $query->andFilterWhere(['like', 'tgl_pembelian', $this->tgl_pembelian])
            ->andFilterWhere(['like', 'harga_yg_dibayar', $this->harga_yg_dibayar])
            ->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'id_pembeli', $this->id_pembeli])
            ->andFilterWhere(['like', 'id_transaksi', $this->id_transaksi]);

        return $dataProvider;
    }
}
