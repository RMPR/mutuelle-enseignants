<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 05/01/2019
 * Time: 02:50
 */

namespace app\models;


use yii\base\Model;

class RetraitFondForm extends Model
{
    public $date;

    public function rules()
    {
        return [
            ['date', 'string', 'min' => 4],
            ['date', 'required', 'message' =>  "Vous n'avez pas entré de session"]
        ];
    }
}