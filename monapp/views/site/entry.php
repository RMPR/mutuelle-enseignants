<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 23/12/2018
 * Time: 19:19
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'nom')->label("Votre nom");?>
    <?= $form->field($model, 'email')->label("Votre email");?>
    <div class="form-group">
        <?= Html::submitButton('Soumettre' , ['class' => 'btn btn-primary'])?>
    </div>
<?php ActiveForm::end();?>
