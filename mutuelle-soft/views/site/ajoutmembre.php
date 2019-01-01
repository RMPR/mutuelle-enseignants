<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

// TODO (2) Changer le style de la page ajoutmembre.php

if(Yii::$app->session->hasFlash("succes"))
    echo "<div class='alert alert-success'>" . Yii::$app->session->getFlash("succes") . "</div>";
?>

<?php Pjax::begin([]);?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]);?>

    <div class="container col-lg-6 ">
        <?= $form->field($model, 'nom')->input('text', ['placeholder' => "Entrez votre nom"])->label("Nom");?>
        <?= $form->field($model, 'prenom')->input('text', ['placeholder' => "Entrez votre prénom"])->label("Prénom");?>
        <?= $form->field($model, 'pass')->passwordInput()->input('password', ['placeholder' => "Entrez un mot de passe"])->label("Mot de passe");?>
        <?= $form->field($model, 'telephone')->input('text', ['placeholder' => "Entrez votre numéro de téléphone"])->label("Téléphone");?>
        <?= $form->field($model, 'email')->input("email", ['placeholder' => 'Entrez votre email'])->label("Email");?>
        <?= $form->field($model, 'adresse')->input('text', ['placeholder' => "Entrez votre adresse"])->label("Adresse");?>
        <?= $form->field($model, 'photo')->fileInput()->label("Photo de profil");?>
        <?= $form->field($model, 'dateinscription')->input('text');?>

        <div class="form-group">
            <div class="text-right">
                <?= Html::submitButton('Valider', ['class' => 'btn btn-primary'])?>
            </div>
        </div>
    </div>


<?php ActiveForm::end();?>

<?php Pjax::end();?>