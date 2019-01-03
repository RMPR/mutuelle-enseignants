<?php

namespace app\models;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "epargne".
 *
 * @property int $idepargne
 * @property double $montant
 * @property string $session
 * @property int $enseignant_idenseignant
 *
 * @property Enseignant $enseignantIdenseignant
 */
class Epargne extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['montant', 'enseignant_idenseignant'], 'required'],
            [['montant'], 'number'],
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
            'idepargne' => 'Idepargne',
            'montant' => 'Montant',
            'session' => 'Session',
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
}

