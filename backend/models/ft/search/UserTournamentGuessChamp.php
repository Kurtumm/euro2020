<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\UserTournamentGuessChamp as UserTournamentGuessChampModel;

/**
 * UserTournamentGuessChamp represents the model behind the search form about `common\models\ft\UserTournamentGuessChamp`.
 */
class UserTournamentGuessChamp extends UserTournamentGuessChampModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'tournamentId', 'countryId'], 'integer'],
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
        $query = UserTournamentGuessChampModel::find();

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
            'countryId' => $this->countryId,
        ]);

        return $dataProvider;
    }
}
