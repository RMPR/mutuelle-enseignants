<?php
use yii\helpers\Html;
use \app\models\Epargne;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\console\widgets\Table;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

Pjax::begin();
?>


<div class="container col-lg-8 col-md-8 form-pop-epr">
    <legend class="row label_ajout_epr text-center">Ajouter un emprunt</legend>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <label for="nom_ajout_epr" class="col-lg-2 col-md-2">Nom</label>
            <div class="col-lg-6">
                <!--                        <input type="text" name="nom_ajout_epr" class="form-control nom_ajout_epr" placeholder="Entrez votre nom"/>-->

<!--                -->
                <select class="form-control" name="select">
                <?php

                    foreach ($enseignants as $enseignant)
                        echo '<option value="' . $enseignant->idenseignant . '">' . $enseignant->nom . ' ' .$enseignant->prenom . '</option>';
                    echo '';

                ?>
                 </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="montant_ajout_epr" class="col-lg-2 col-md-2">Montant</label>
            <div class="col-lg-6">
                <!--                        <input type="text" name="montant_ajout_epr" class="form-control montant_ajout_epr" placeholder="Entrez le montant"/>-->
                <?= $form->field($ajoutEmpruntForm, 'montant_a')->input("text", ["placeholder" => "Entrez le montant",
                    "class" => "form-control montant_ajout_epr"]) ->label("")?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="session_ajout_epr" class="col-lg-2 col-md-2">Session</label>
            <div class="col-lg-6">
                <!--                        <input type="text" name="session_ajout_epr" class="form-control session_ajout_epr" placeholder="Entrez la date de la session"/>-->
                <?= $form->field($ajoutEmpruntForm, 'session_a')->input("text", ["placeholder" => "Entrez la date de la session",
                    "class" => "form-control session_ajout_epr",]) -> label("")?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Ajouter" class="btn col-lg-offset-6 bouton_ajout_epr">
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php Pjax::end()?>

<div class="container-fluid table-rem">
    <table class="table table-bordered">
        <caption class="text-center caption-emp">Liste des emprunts</caption>
        <thead class="table-head">
            <th>N°</th>
            <th>Nom</th>
            <th>Montant</th>
            <th>Session</th>
            <th>Intérêt</th>
            <th>Date de remise</th>
        </thead>
        <tbody>
            <?php //nom, montant, session, interet, databutoir
                foreach ($listeEmprunteurs as $emprunteur)
                {
                    echo "<tr>
                            <td>".  $emprunteur['idenseignant'] . "</td>
                            <td>".  $emprunteur['nom'] . ' '. $emprunteur['prenom']."</td>
                            <td>".  $emprunteur['montant']."</td>
                            <td>".  $emprunteur['session']."</td>
                            <td>".  $emprunteur['interet']."</td>
                            <td>".  $emprunteur['databutoir'] ."</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
