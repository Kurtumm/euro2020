<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\TournamentRound as TournamentRoundModel;

/**
 * TournamentRound represents the model behind the search form about `common\models\ft\TournamentRound`.
 */
class TournamentRound extends TournamentRoundModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournamentRoundId', 'status', 'tournamentId'], 'integer'],
            [['title'], 'safe'],
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
        $query = TournamentRoundModel::find();

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
            'tournamentRoundId' => $this->tournamentRoundId,
            'status' => $this->status,
            'tournamentId' => $this->tournamentId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
