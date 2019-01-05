<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 04/01/2019
 * Time: 03:42
 */

namespace app\models;


use yii\base\Model;

/**
 * Class RetraitEpargneForm
 * @package app\models
 * Elle représente le formulaire de retrait d'une épargne
 * Présente de plus les règles de validation de celui-ci
 */
class RetraitEpargneForm extends Model
{
    public $nom_r;
    public $montant_r;
    public $session_r;

    public function rules()
    {
        return [
            ['montant_r', 'number', 'message' => 'Le montant doit être un nombre'],
            ['montant_r', 'default', 'value' => 0],
            ['montant_r', 'required','message' => "Vous n'avez pas entré de montant"],
            ['montant_r', 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number', 'message' => 'Vous avez entré un montant négatif'],
            ['session_r', 'string', 'min' => 4],
            ['session_r', 'required', 'message' =>  "Vous n'avez pas entré de session"]
        ];
    }
}