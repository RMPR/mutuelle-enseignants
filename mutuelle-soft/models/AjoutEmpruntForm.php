<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 02/01/2019
 * Time: 22:04
 */

namespace app\models;


use yii\base\Model;

class AjoutEmpruntForm extends Model
{
    public $nom_a;
    public $montant_a;
    public $session_a;

    public function rules()
    {
        return [
            ['montant_a', 'number', 'message' => 'Le montant doit être un nombre'],
            ['montant_a', 'default', 'value' => 0],
            ['montant_a', 'required', 'message' => 'Le champ montant ne peut pas être vide'],
            ['montant_a', 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Le montant doit être strictement supérieur à 0'],
            ['session_a', 'string', 'min' => 4],
            ['session_a', 'required', 'message' => 'Vous n\'avez pas entré de session']
        ];
    }
}