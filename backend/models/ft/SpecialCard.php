<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\SpecialCard as SpecialCardModel;
use \backend\models\ft\query\SpecialCardQuery;
/**
* This is the model class for table "special_card".
*
* @property string $specialCardId
* @property integer $status
* @property string $title
* @property integer $multiple
*
* @property UserTournamentSpecialCard[] $userTournamentSpecialCards
*/

class SpecialCard extends SpecialCardModel
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), []);
    }

    /**
    * @inheritdoc
    * @return \backend\models\ft\query\SpecialCardQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new SpecialCardQuery(get_called_class());
    }
}
