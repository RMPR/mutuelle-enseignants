<?php

use yii\helpers\Html;
use \app\models\Epargne;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

?>



<div class="container col-lg-8 col-md-8 form-pop-epr">
        <legend class="row label_ajout_epr text-center">Nouvelle épargne</legend>
    <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="form-group">
                    <label for="nom_ajout_epr" class="col-lg-2 col-md-2">Nom</label>
                    <div class="col-lg-6">
<!--                        <input type="text" name="nom_ajout_epr" class="form-control nom_ajout_epr" placeholder="Entrez votre nom"/>-->

                        <?=$form->field($ajoutEpargneForm, 'nom_a')->dropDownList($nomsEpargnants

                                                                            )->label('')?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="montant_ajout_epr" class="col-lg-2 col-md-2">Montant</label>
                    <div class="col-lg-6">
<!--                        <input type="text" name="montant_ajout_epr" class="form-control montant_ajout_epr" placeholder="Entrez le montant"/>-->
                        <?= $form->field($ajoutEpargneForm, 'montant_a')->input("text", ["placeholder" => "Entrez le montant",
                                                                                                        "class" => "form-control montant_ajout_epr"]) ->label("")?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="session_ajout_epr" class="col-lg-2 col-md-2">Session</label>
                    <div class="col-lg-6">
<!--                        <input type="text" name="session_ajout_epr" class="form-control session_ajout_epr" placeholder="Entrez la date de la session"/>-->
                        <?= $form->field($ajoutEpargneForm, 'session_a')->input("text", ["placeholder" => "Entrez la date de la session",
                            "class" => "form-control session_ajout_epr",]) -> label("")?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Ajouter" class="btn col-lg-offset-6 bouton_ajout_epr">
            </div>
    <?php ActiveForm::end(); ?>
</div>





<div class="container container-epr">

<?php // $form1 = ActiveForm::begin(); ?>

<?php
foreach ($post as $p)
    echo "<div class='row ligne-epr'>
                <span class='col-lg-1 col-md-1 col-xs-1 num-epr'> " . $p['idenseignant'] . "</span>
                <span class='col-lg-4 col-md-4 col-xs-4 nom-epr'>" . $p['nom']. " " .$p['prenom'] . "</span>
                <span class='col-lg-3 col-md-3 col-xs-4 actuel-epr'>Montant actuel : " . $p["montant"]. "</span>
                <input type='text' class='col-lg-3 col-md-3 col-xs-3 text-center montant-epr' name='" . $p['idenseignant'] ."' placeholder='Veuillez saisir le montant de retrait ici'/>
                <input type='submit' value='Retirer' class='col-lg-1 col-md-1 col-xs-3 col-xs-offset-0 btn submit-epr' name='" . $p['idenseignant'] . "'>
          </div>
";
?>

<?//ActiveForm::end();?>

</div>