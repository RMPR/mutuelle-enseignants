<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 26/12/2018
 * Time: 16:23
 */

namespace app\models;
use \yii\base\Model;

class AjoutmembreForm extends Model
{
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $adresse;
    public $photo;
    public $dateinscription;
    public $pass;

    public function rules()
    {
        return
        [
            ['nom', 'required', 'message' => 'Vous n\'avez pas entrer de nom'],
            ['email', 'required', 'message' => 'Vous n\'avez pas entrer d\'email'],
            ['pass', 'required', 'message' => 'Vous n\'avez pas entrer de mot de passe'],
            ['dateinscription', 'required', 'message' => 'Vous n\'avez pas choisi de date d\'inscription'],
            ['dateinscription', 'string', 'min' => 4],
            ['adresse', 'required', 'message' => 'Vous n\'avez pas entrer d\'adresse'],
            ['email', 'email'],
            ['photo','file', 'extensions' => 'png, jpg, gif, jpeg, PNG, JPG, JPEG, GIF', 'maxSize' => 2048 * 2048],
            ['telephone', 'string', 'max' => 16, 'message' => 'le numéro de téléphone doit contenir moins de 15 chiffres selon la norme'],
            ['prenom', 'string', 'min' => 0]
        ];
    }

}