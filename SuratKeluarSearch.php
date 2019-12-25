<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;

/**
 * SuratKeluarSearch represents the model behind the search form about `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_skeluar', 'tgl_surat', 'sifat', 'lampiran', 'nama_instansi', 'lampiran1', 'lampiran2', 'lampiran3', 'lampiran4'], 'safe'],
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
        $query = SuratKeluar::find();

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
        ]);

        $query->andFilterWhere(['like', 'no_skeluar', $this->no_skeluar])
            ->andFilterWhere(['like', 'sifat', $this->sifat])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran])
            ->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
            ->andFilterWhere(['like', 'lampiran1', $this->lampiran1])
            ->andFilterWhere(['like', 'lampiran2', $this->lampiran2])
            ->andFilterWhere(['like', 'lampiran3', $this->lampiran3])
            ->andFilterWhere(['like', 'lampiran4', $this->lampiran4]);

        return $dataProvider;
    }
}
