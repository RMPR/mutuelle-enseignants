<?php

//use yii\helpers\Html;
use \app\models\Enseignant;

$enseignants = Enseignant::find()->orderBy("nom ASC")->all();

foreach ($enseignants as $enseignant)
    echo '<img src="../../uploads/'. $enseignant->photo . '"/>' .$enseignant->nom . '<br/>';

echo "<img src='../../uploads/sabre.jpg'/>";