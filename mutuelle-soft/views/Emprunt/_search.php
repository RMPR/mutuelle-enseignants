<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpruntSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprunt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idemprunt') ?>

    <?= $form->field($model, 'montant') ?>

    <?= $form->field($model, 'session') ?>

    <?= $form->field($model, 'interet') ?>

    <?= $form->field($model, 'databutoir') ?>

    <?php // echo $form->field($model, 'enseignant_idenseignant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
