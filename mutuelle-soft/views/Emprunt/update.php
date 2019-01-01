<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = 'Update Emprunt: ' . $model->idemprunt;
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idemprunt, 'url' => ['view', 'idemprunt' => $model->idemprunt, 'enseignant_idenseignant' => $model->enseignant_idenseignant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emprunt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
