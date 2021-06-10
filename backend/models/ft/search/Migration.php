<?php

namespace backend\models\ft\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ft\Migration as MigrationModel;

/**
 * Migration represents the model behind the search form about `common\models\ft\Migration`.
 */
class Migration extends MigrationModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'safe'],
            [['apply_time'], 'integer'],
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
        $query = MigrationModel::find();

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
            'apply_time' => $this->apply_time,
        ]);

        $query->andFilterWhere(['like', 'version', $this->version]);

        return $dataProvider;
    }
}
