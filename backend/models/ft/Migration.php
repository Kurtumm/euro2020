<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\Migration as MigrationModel;
use \backend\models\ft\query\MigrationQuery;
/**
* This is the model class for table "migration".
*
* @property string $version
* @property integer $apply_time
*/

class Migration extends MigrationModel
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
    * @return \backend\models\ft\query\MigrationQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new MigrationQuery(get_called_class());
    }
}
