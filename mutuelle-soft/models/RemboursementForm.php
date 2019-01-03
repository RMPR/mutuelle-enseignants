<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 02/01/2019
 * Time: 20:42
 */

namespace app\models;


use yii\base\Model;

class RemboursementForm extends Model
{
    public $montant;

    public function rules()
    {
        return [
          ['montant', 'number', 'message' => 'Le montant doit être un nombre'],
          ['montant', 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number', 'message' => 'Vous avez entré un montant négatif'],

        ];
    }
}