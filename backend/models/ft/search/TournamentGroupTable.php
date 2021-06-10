<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\TournamentGroupTable as TournamentGroupTableModel;

/**
 * TournamentGroupTable represents the model behind the search form about `common\models\ft\TournamentGroupTable`.
 */
class TournamentGroupTable extends TournamentGroupTableModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournamentGroupTableId', 'tournamentId', 'countryId', 'won', 'draw', 'lost', 'gf', 'ga', 'point'], 'integer'],
            [['status', 'title'], 'safe'],
            [['searchText'], 'safe']
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
        $query = TournamentGroupTableModel::find();

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
            'tournamentGroupTableId' => $this->tournamentGroupTableId,
            'tournamentId' => $this->tournamentId,
            'countryId' => $this->countryId,
            'won' => $this->won,
            'draw' => $this->draw,
            'lost' => $this->lost,
            'gf' => $this->gf,
            'ga' => $this->ga,
            'point' => $this->point,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
