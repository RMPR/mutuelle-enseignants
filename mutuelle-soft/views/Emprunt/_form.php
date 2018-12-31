<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprunt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'montant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'session')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'databutoir')->textInput() ?>

    <?= $form->field($model, 'enseignant_idenseignant')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
