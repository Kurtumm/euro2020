<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\UserProfile as UserProfileModel;

/**
 * UserProfile represents the model behind the search form about `common\models\ft\UserProfile`.
 */
class UserProfile extends UserProfileModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userProfileId', 'status', 'userId'], 'integer'],
            [['name', 'avatar'], 'safe'],
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
        $query = UserProfileModel::find();

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
            'userProfileId' => $this->userProfileId,
            'status' => $this->status,
            'userId' => $this->userId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}
