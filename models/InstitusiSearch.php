<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Institusi;

/**
 * InstitusiSearch represents the model behind the search form of `app\models\Institusi`.
 */
class InstitusiSearch extends Institusi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'nama_ketua', 'tanggal_berdiri', 'alamat', 'nomor_telp', 'homepage', 'email'], 'safe'],
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
        $query = Institusi::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nama_ketua', $this->nama_ketua])
            ->andFilterWhere(['like', 'tanggal_berdiri', $this->tanggal_berdiri])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nomor_telp', $this->nomor_telp])
            ->andFilterWhere(['like', 'homepage', $this->homepage])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
