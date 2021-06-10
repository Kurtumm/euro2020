<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\TournamentGroup as TournamentGroupModel;

/**
 * TournamentGroup represents the model behind the search form about `common\models\ft\TournamentGroup`.
 */
class TournamentGroup extends TournamentGroupModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournamentGroupId', 'status', 'tournamentId'], 'integer'],
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
        $query = TournamentGroupModel::find();

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
            'tournamentGroupId' => $this->tournamentGroupId,
            'status' => $this->status,
            'tournamentId' => $this->tournamentId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
