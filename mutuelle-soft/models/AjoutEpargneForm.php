<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 02/01/2019
 * Time: 11:02
 */

namespace app\models;


use yii\base\Model;

class AjoutEpargneForm extends Model
{
    public $nom_a;
    public $montant_a;
    public $session_a;

    /**
     * On définit ici les critères de validation du formulaire d'ajout d'une épargne
     */
    public function rules()
    {
        return [
            ['montant_a', 'number', 'message' => 'Le montant doit être un nombre'],
            ['montant_a', 'default', 'value' => 0],
            ['montant_a', 'required'],
            ['montant_a', 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number', 'message' => 'Vous avez entré un montant négatif'],
            ['session_a', 'string', 'min' => 4],
            ['session_a', 'required']
        ];
    }
}