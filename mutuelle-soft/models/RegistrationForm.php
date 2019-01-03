<?php 
namespace app\models;

use Yii;
use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;
/** 
 * Personnalisation du formulaire pour notre
 * Utilisation
 */
class RegistrationForm extends BaseRegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user', 'Name');
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'Photo de profil' => $this->avatar,
            'email'    => $this->email,
            'Telephone' => $this->phone,
            'Nom' => $this->username,
            'Mot de Passe' => $this->password,
            'Adresse' => $this->location,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
        ]);
        $user->setProfile($profile);
    }
}