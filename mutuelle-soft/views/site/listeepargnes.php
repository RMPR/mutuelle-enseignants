<?php

use yii\helpers\Html;
use \app\models\Epargne;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;


echo '<span class="row">
        <button class="btn text-center bouton-epr">Ajouter une épargne</button>
        
</span>';

echo '<div class="container-fluid container-epr">';

$form = ActiveForm::begin();

foreach ($post as $p)
    echo "<div class='row ligne-epr'>
                <span class='col-lg-1 col-md-1 col-xs-1 num-epr'> " . $p['idenseignant'] . "</span>
                <span class='col-lg-4 col-md-4 col-xs-4 nom-epr'>" . $p['nom']. " " .$p['prenom'] . "</span>
                <span class='col-lg-3 col-md-3 col-xs-4 actuel-epr'>Montant actuel : " . $p["montant"]. "</span>
                <input type='text' class='col-lg-3 col-md-3 col-xs-3 text-center montant-epr' id='" . $p['idenseignant'] ."' placeholder='Veuillez saisir le montant de retrait ici'/>
                <input type='submit' value='Retirer' class='col-lg-1 col-md-1 col-xs-3 col-xs-offset-0 btn submit-epr' id='" . $p['idenseignant'] . "'>
          </div>
";


ActiveForm::end();

echo '</div>';

?>
