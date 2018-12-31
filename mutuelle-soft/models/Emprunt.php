<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprunt".
 *
 * @property int $idemprunt
 * @property string $montant
 * @property string $session
 * @property string $interet
 * @property string $databutoir
 * @property int $enseignant_idenseignant
 *
 * @property Enseignant $enseignantIdenseignant
 * @property Remboursement[] $remboursements
 */
class Emprunt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emprunt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['montant', 'enseignant_idenseignant'], 'required'],
            [['montant', 'interet'], 'number'],
            [['databutoir'], 'safe'],
            [['enseignant_idenseignant'], 'integer'],
            [['session'], 'string', 'max' => 30],
            [['enseignant_idenseignant'], 'exist', 'skipOnError' => true, 'targetClass' => Enseignant::className(), 'targetAttribute' => ['enseignant_idenseignant' => 'idenseignant']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemprunt' => 'Idemprunt',
            'montant' => 'Montant',
            'session' => 'Session',
            'interet' => 'Interet',
            'databutoir' => 'Databutoir',
            'enseignant_idenseignant' => 'Enseignant Idenseignant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseignantIdenseignant()
    {
        return $this->hasOne(Enseignant::className(), ['idenseignant' => 'enseignant_idenseignant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemboursements()
    {
        return $this->hasMany(Remboursement::className(), ['emprunt_idemprunt' => 'idemprunt', 'emprunt_enseignant_idenseignant' => 'enseignant_idenseignant']);
    }
}
