<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\TournamentMatch as TournamentMatchModel;

/**
 * TournamentMatch represents the model behind the search form about `common\models\ft\TournamentMatch`.
 */
class TournamentMatch extends TournamentMatchModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournamentMatchId', 'status', 'homeCountryId', 'homeScore', 'awayCountryId', 'awayScore', 'matchResult', 'tournamentGroupId', 'tournamentRoundId', 'tournamentGroupTableId'], 'integer'],
            [['matchDateTime'], 'safe'],
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
        $query = TournamentMatchModel::find();

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
            'tournamentMatchId' => $this->tournamentMatchId,
            'status' => $this->status,
            'homeCountryId' => $this->homeCountryId,
            'homeScore' => $this->homeScore,
            'awayCountryId' => $this->awayCountryId,
            'awayScore' => $this->awayScore,
            'matchResult' => $this->matchResult,
            'matchDateTime' => $this->matchDateTime,
            'tournamentGroupId' => $this->tournamentGroupId,
            'tournamentRoundId' => $this->tournamentRoundId,
            'tournamentGroupTableId' => $this->tournamentGroupTableId,
        ]);

        return $dataProvider;
    }
}
