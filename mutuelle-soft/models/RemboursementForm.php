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
    public $session;
    public $nom;

    public function rules()
    {
        return [
            ['montant', 'number', 'message' => 'Le montant doit être un nombre'],
            ['montant', 'default', 'value' => 0],
            ['montant', 'required', 'message' => 'Le champ montant ne peut pas être vide'],
            ['montant', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Le montant doit être strictement supérieur à 0'],
            ['session', 'string', 'min' => 4],
            ['session', 'required', 'message' => 'Vous n\'avez pas entré de session']
        ];
    }
}