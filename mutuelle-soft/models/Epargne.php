<?php

namespace app\models;
use yii\db\ActiveRecord;

class Epargne extends ActiveRecord
{
    public static function tableName()
    {
        return 'epargne';
    }
}