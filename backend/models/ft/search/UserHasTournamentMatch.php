<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\UserHasTournamentMatch as UserHasTournamentMatchModel;

/**
 * UserHasTournamentMatch represents the model behind the search form about `common\models\ft\UserHasTournamentMatch`.
 */
class UserHasTournamentMatch extends UserHasTournamentMatchModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'tournamentMatchId', 'status', 'homeScore', 'awayScore', 'multiplePoint', 'guessResult', 'point', 'scorePoint', 'totalPoint'], 'integer'],
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
        $query = UserHasTournamentMatchModel::find();

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
            'userId' => $this->userId,
            'tournamentMatchId' => $this->tournamentMatchId,
            'status' => $this->status,
            'homeScore' => $this->homeScore,
            'awayScore' => $this->awayScore,
            'multiplePoint' => $this->multiplePoint,
            'guessResult' => $this->guessResult,
            'point' => $this->point,
            'scorePoint' => $this->scorePoint,
            'totalPoint' => $this->totalPoint,
        ]);

        return $dataProvider;
    }
}
