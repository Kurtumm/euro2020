<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\UserTournamentSpecialCard as UserTournamentSpecialCardModel;

/**
 * UserTournamentSpecialCard represents the model behind the search form about `common\models\ft\UserTournamentSpecialCard`.
 */
class UserTournamentSpecialCard extends UserTournamentSpecialCardModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'userId', 'tournamentId', 'specialCardId', 'multiple', 'qouta', 'used'], 'integer'],
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
        $query = UserTournamentSpecialCardModel::find();

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
            'status' => $this->status,
            'userId' => $this->userId,
            'tournamentId' => $this->tournamentId,
            'specialCardId' => $this->specialCardId,
            'multiple' => $this->multiple,
            'qouta' => $this->qouta,
            'used' => $this->used,
        ]);

        return $dataProvider;
    }
}
