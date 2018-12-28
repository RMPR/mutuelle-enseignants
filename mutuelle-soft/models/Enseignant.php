<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 27/12/2018
 * Time: 22:32
 */

namespace app\models;


use yii\db\ActiveRecord;

class Enseignant extends ActiveRecord
{
    public static function tableName()
    {
        return 'enseignant';
    }
}