<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $userProfileId
 * @property int $status
 * @property int $userId
 * @property string $name
 * @property string|null $avatar
 *
 * @property User $user
 */
class UserProfile extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'userId'], 'integer'],
            [['userId', 'name'], 'required'],
            [['name', 'avatar'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userProfileId' => Yii::t('app', 'User Profile ID'),
            'status' => Yii::t('app', 'Status'),
            'userId' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'avatar' => Yii::t('app', 'Avatar'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * {@inheritdoc}
     * @return UserProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProfileQuery(get_called_class());
    }
}
