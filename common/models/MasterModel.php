<?php

namespace common\models;

use Yii;
//use yii\behaviors\TimestampBehavior;
//use yii\db\Expression;

class MasterModel extends \yii\db\ActiveRecord
{
//date thai type
    const DATE_THAI_TYPE_FULL = 1;
    const DATE_THAI_TYPE_SHORT = 2;

    //status
    const STATUS_ACTIVE = 0x1;
    const STATUS_INACTIVE = 0x2;

    public $searchText;
    public $sum;

    /*
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createDateTime',
                'updatedAtAttribute' => 'updateDateTime',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
     */

    /**
     * @param $fileName
     * @param $text
     * @param string $mode
     */
    public function writeToFile($fileName, $text, $mode = 'w+')
    {
        $handle = fopen($fileName, $mode);
        fwrite($handle, $text);
        fclose($handle);
    }

    /**
     * reset all attribute value
     */
    public function unsetAllAttributeValue()
    {
        foreach ($this->attributes as $key=>$val) {
            $this->$key = null;
        }
    }

    public function getFilePath()
    {
        $path = explode('/', isset($this->path) ? $this->path : $this->image);
        return end($path);
    }

    const GUEST_RESULT_HOME_WIN = 1;
    const GUEST_RESULT_DRAW = 2;
    const GUEST_RESULT_AWAY_WIN = 3;

    public function getGuessResultArray()
    {
        return [
            self::GUEST_RESULT_HOME_WIN => 'เจ้าบ้านชนะ',
            self::GUEST_RESULT_DRAW => 'เสมอ',
            self::GUEST_RESULT_AWAY_WIN => 'ทีมเยือนชนะ',
        ];
    }

    public function getGuessResultText()
    {
        return $this->getGuessResultArray()[$this->matchResult];
    }
}
