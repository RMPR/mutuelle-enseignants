<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */

$this->title = Yii::t('user', 'Inscription');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                ]); ?>
                
                <?= $form->field($model, 'Photo de profil') ?>
                
                <?= $form->field($model, 'name') ?>
                
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'Telephone') ?>

                <?= $form->field($model, 'Nom') ?>

                <?= $form->field($model, 'Mot de Passe')->passwordInput() ?>

                <?= $form->field($model, 'Adresse') ?>

                <?= Html::submitButton(Yii::t('user', 'Inscription'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Déjà inscrit ? Connectez-vous'), ['/user/security/login']) ?>
        </p>
    </div>
</div>