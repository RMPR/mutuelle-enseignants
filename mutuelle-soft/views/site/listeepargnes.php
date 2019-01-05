<?php

use yii\helpers\Html;
use \app\models\Epargne;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;

?>
<?php
$script = <<< JS

    $(function()
    {
        decouvert = true; // Quand le form d'ajout est visible
        decouvert2 = false;
        $("div#form-pop-epr2").hide();
        
        $('#ajoutepr').bind('click', function(){
            if(!decouvert)
            {
                $("div#form-pop-epr").show("slow");
                $("span#symbol").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                decouvert = true;
            }    
            else
            {
                $("div#form-pop-epr").hide("slow");
                $("span#symbol").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                decouvert = false;
            }    
        });
        
        $('#retraitepr').bind('click', function(){
            if(!decouvert2)
            {
                $("div#form-pop-epr2").show("slow");
                $("span#symbol2").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                decouvert2 = true;
            }    
            else
            {
                $("div#form-pop-epr2").hide("slow");
                $("span#symbol2").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                decouvert2 = false;
            }    
        });
        
    })

JS;
$this->registerJs($script);
?>

<div class='succesajoutepr'>
    <?php
    if(Yii::$app->session->hasFlash("succesajoutepr"))
        echo "<div class='alert alert-success '>" . Yii::$app->session->getFlash("succesajoutepr") . "</div>";
    ?>
</div>

<div class="container col-lg-push-1">
    <button class="btn bouton_ajout_epr text-left" id="ajoutepr">
        <span class="glyphicon glyphicon-minus" id="symbol"></span>
        Ajouter une épargne
    </button>
    <button class="btn bouton_ajout_epr text-right" id="retraitepr">
        <span class="glyphicon glyphicon-plus" id="symbol2"></span>
        Retirer de l'argent
    </button>
</div>

<div class="container-fluid col-lg-8 col-lg-push-1 col-md-8 form-pop-epr" >

    <div id="form-pop-epr">
        <legend class="row label_ajout_epr text-center">Nouvelle épargne</legend>
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <label for="nom_ajout_epr" class="col-lg-2 col-md-2">Nom</label>
            <!--                        <input type="text" name="nom_ajout_epr" class="form-control nom_ajout_epr" placeholder="Entrez votre nom"/>-->

            <select name="selectnomepr" class="form-control">
                <?php

                foreach ($nomsEpargnants as $enseignant)
                    echo '<option value="' . $enseignant['id'] . '">' . $enseignant['username'] . '</option>';

                ?>
            </select>

        </div>
        <div class="form-group">
            <label for="montant_ajout_epr" class="col-lg-2 col-md-2">Montant</label>
            <?= $form->field($ajoutEpargneForm, 'montant_a')->input("text", ["placeholder" => "Entrez le montant",
                "class" => "form-control montant_ajout_epr"]) ->label("")?>

        </div>
        <div class="form-group">
            <!--                            <input type="text" name="session_ajout_epr" id="session" class="form-control session_ajout_epr" placeholder="Entrez la date de la session"/>-->
            <label for="" class="col-lg-2 col-md-2">Session</label>
            <?=$form->field($ajoutEpargneForm, 'session_a')->widget(\yii\jui\DatePicker::className(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control session_ajout_epr',
                    'placeholder' => 'Choisir la session'
                ]
            ])->label(""); ?>

        </div>
        <div class="form-group text-right">
            <input type="submit" value="Ajouter" class="btn  bouton_ajout_epr">
        </div>

        <?php ActiveForm::end(); ?>
    </div>



    <div id="form-pop-epr2">
        <legend class="row label_ajout_epr text-center">Retirer de l'argent</legend>
        <?php $form2 = ActiveForm::begin(); ?>
        <div class="form-group">
            <label for="nom_ajout_epr" class="col-lg-2 col-md-2">Nom</label>
            <!--                        <input type="text" name="nom_ajout_epr" class="form-control nom_ajout_epr" placeholder="Entrez votre nom"/>-->

            <select name="selectnomepr2" class="form-control">
                <?php

                foreach ($nomsEpargnants as $enseignant)
                    echo '<option value="' . $enseignant['id'] . '">' . $enseignant['username'] . '</option>';

                ?>
            </select>

        </div>
        <div class="form-group">
            <label for="montant_ajout_epr" class="col-lg-2 col-md-2">Montant</label>
            <?= $form2->field($retraitEpargneForm, 'montant_r')->input("text", ["placeholder" => "Entrez le montant",
                "class" => "form-control montant_ajout_epr"]) ->label("")?>

        </div>
        <div class="form-group">
            <!--                            <input type="text" name="session_ajout_epr" id="session" class="form-control session_ajout_epr" placeholder="Entrez la date de la session"/>-->
            <label for="" class="col-lg-2 col-md-2">Session</label>
            <?=$form2->field($retraitEpargneForm, 'session_r')->widget(\yii\jui\DatePicker::className(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control session_ajout_epr',
                    'placeholder' => 'Choisir la session'
                ]
            ])->label(""); ?>

        </div>
        <div class="form-group text-right">
            <input type="submit" value="Retirer" class="btn  bouton_ajout_epr">
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>


<div class="container-fluid table-rem">
        <table class="table table-bordered">
            <caption class="text-center caption-emp">Liste des épargnes</caption>
            <thead class="table-head">
            <th>N°</th>
            <th>Nom</th>
            <th>Montant actuel</th>
            </thead>
            <tbody>
            <?php //nom, montant, session, interet, databutoir
            foreach ($post as $p)
            {
                echo "<tr>
                            <td>".  $p['id'] . "</td>
                            <td>".  $p['username']."</td>
                            <td>".  $p['montant']."</td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>

</div>