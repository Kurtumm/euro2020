<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\Tournament as TournamentModel;

/**
 * Tournament represents the model behind the search form about `common\models\ft\Tournament`.
 */
class Tournament extends TournamentModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournamentId', 'status', 'type'], 'integer'],
            [['title', 'startDate', 'endDate'], 'safe'],
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
        $query = TournamentModel::find();

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
            'tournamentId' => $this->tournamentId,
            'status' => $this->status,
            'type' => $this->type,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
