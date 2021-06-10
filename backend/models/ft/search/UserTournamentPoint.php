<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\UserTournamentPoint as UserTournamentPointModel;

/**
 * UserTournamentPoint represents the model behind the search form about `common\models\ft\UserTournamentPoint`.
 */
class UserTournamentPoint extends UserTournamentPointModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'tournamentId', 'point'], 'integer'],
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
        $query = UserTournamentPointModel::find();

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
            'tournamentId' => $this->tournamentId,
            'point' => $this->point,
        ]);

        return $dataProvider;
    }
}
