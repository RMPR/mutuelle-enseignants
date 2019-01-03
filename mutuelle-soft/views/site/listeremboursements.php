<?php

use yii\helpers\Html;
use \app\models\Epargne;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

?>

<div class="container content-rem">

<?php  $form2 = ActiveForm::begin(); ?>

    <div class='row ligne-rem'>
<?php
foreach ($post as $p)
{
echo "
                <span class='col-lg-1 col-md-1 col-xs-1 num-epr'> " . $p['idenseignant'] . "</span>
                <span class='col-lg-4 col-md-4 col-xs-4 nom-epr'>" . $p['nom']. " " .$p['prenom'] . "</span>
                <span class='col-lg-3 col-md-3 col-xs-4 actuel-epr'>Montant actuel : " . $p["montant"]. "</span>  
     ";
?>
<!--                -->
<!--                -->
<!--                <input type='text' class='col-lg-3 col-md-3 col-xs-3 text-center montant-epr' name='" . $p['idenseignant'] ."' placeholder='Veuillez saisir le montant de retrait ici'/>-->
                <?= $form2->field($remboursementForm, 'montant')->input("text", ["placeholder" => "Veuillez entrer le montant ici",
                                                                                              "class" => "col-lg-3 col-md-3 col-xs-3 text-center montant-epr"])->label(''); ?>
                <input type='submit' value='Rembourser' class='col-lg-1 col-md-1 col-xs-3  btn submit-epr'>
    <input>
<?php

echo "</div>";
}

;
?>

<?php ActiveForm::end();?>

</div>