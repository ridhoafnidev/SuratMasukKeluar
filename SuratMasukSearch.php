<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratMasuk;

/**
 * SuratMasukSearch represents the model behind the search form about `app\models\SuratMasuk`.
 */
class SuratMasukSearch extends SuratMasuk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_smasuk', 'tgl_surat', 'tgl_diterima', 'sifat', 'lampiran', 'lampiran4', 'nama_instansi', 'lampiran1', 'lampiran2', 'lampiran3'], 'safe'],
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
        $query = SuratMasuk::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_surat' => $this->tgl_surat,
            'tgl_diterima' => $this->tgl_diterima,
        ]);

        $query->andFilterWhere(['like', 'no_smasuk', $this->no_smasuk])
            ->andFilterWhere(['like', 'sifat', $this->sifat])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran])
            ->andFilterWhere(['like', 'lampiran4', $this->lampiran4])
            ->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
            ->andFilterWhere(['like', 'lampiran1', $this->lampiran1])
            ->andFilterWhere(['like', 'lampiran2', $this->lampiran2])
            ->andFilterWhere(['like', 'lampiran3', $this->lampiran3]);

        return $dataProvider;
    }
}
