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
<?php
$script = <<< JS

    $(function()
    {
        decouvert = false;
        $("div#form-pop-emp").hide();
        $('#ajoutempr').bind('click', function(){
            if(!decouvert)
            {
                $("div#form-pop-emp").show("slow");
                $("span#symbol").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                decouvert = true;
            }    
            else
            {
                $("div#form-pop-emp").hide("slow");
                $("span#symbol").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                decouvert = false;
            }    
        })
    })

JS;
$this->registerJs($script);
?>

<div class='succesajoutemp'>
    <?php
    if(Yii::$app->session->hasFlash("succesajoutemp"))
        echo "<div class='alert alert-success '>" . Yii::$app->session->getFlash("succesajoutemp") . "</div>";
    ?>
</div>

<div class="container-fluid text-left">
    <button class="btn bouton_ajout_epr" id="ajoutempr">
        <span class="glyphicon glyphicon-plus" id="symbol"></span>
        Ajouter un emprunt
    </button>
</div>

<div class="container col-lg-8 col-lg-push-1 col-md-8 form-pop-epr" id="form-pop-emp">
    <legend class="row label_ajout_epr text-center">Ajouter un emprunt</legend>
    <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <label  class="col-lg-2 col-md-2">Nom</label>
                <select class="form-control" name="select">
                <?php

                    foreach ($enseignants as $enseignant)
                        echo '<option value="' . $enseignant["id"] . '">' . $enseignant["username"] . '</option>';

                ?>
                 </select>
        </div>

        <div class="form-group">
            <label for="montant_ajout_epr" class="col-lg-2 col-md-2">Montant</label>
                <!--                        <input type="text" name="montant_ajout_epr" class="form-control montant_ajout_epr" placeholder="Entrez le montant"/>-->
                <?= $form->field($ajoutEmpruntForm, 'montant_a')->input("text", ["placeholder" => "Entrez le montant",
                    "class" => "form-control montant_ajout_epr"]) ->label("")?>

        </div>

        <div class="form-group">
            <label  class="col-lg-2 col-md-2">Session</label>
                <!--                        <input type="text" name="session_ajout_epr" class="form-control session_ajout_epr" placeholder="Entrez la date de la session"/>-->
                <?=$form->field($ajoutEmpruntForm, 'session_a')->widget(\yii\jui\DatePicker::className(), [
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control session_ajout_epr',
                        'placeholder' => 'Choisir la session'
                    ]
                ])->label(""); ?>
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
                            <td>".  $emprunteur['id'] . "</td>
                            <td>".  $emprunteur['username']."</td>
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
