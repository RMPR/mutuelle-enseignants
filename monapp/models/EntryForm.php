<?php
namespace app\models;
use yii\base\Model;

class EntryForm extends Model
{
    public $nom;
    public $email;
    public function rules()
    {
        return [
            [['nom', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}