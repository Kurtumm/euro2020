<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\UserProfile as UserProfileModel;
use \backend\models\ft\query\UserProfileQuery;
/**
* This is the model class for table "user_profile".
*
* @property string $userProfileId
* @property integer $status
* @property integer $userId
* @property string $name
* @property string $avatar
*
* @property User $user
*/

class UserProfile extends UserProfileModel
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
    * @return \backend\models\ft\query\UserProfileQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserProfileQuery(get_called_class());
    }
}
