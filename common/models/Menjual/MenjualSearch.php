<?php

namespace common\models\Menjual;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Menjual\Menjual;

/**
 * MenjualSearch represents the model behind the search form of `common\models\Menjual\Menjual`.
 */
class MenjualSearch extends Menjual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_penjualan', 'nip_karyawan', 'kode_barang', 'id_transaksi'], 'safe'],
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
        $query = Menjual::find();

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

        $query->andFilterWhere(['like', 'tgl_penjualan', $this->tgl_penjualan])
            ->andFilterWhere(['like', 'nip_karyawan', $this->nip_karyawan])
            ->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'id_transaksi', $this->id_transaksi]);

        return $dataProvider;
    }
}
