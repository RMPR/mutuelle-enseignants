<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = 'Update Epargne: ' . $model->idepargne;
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idepargne, 'url' => ['view', 'idepargne' => $model->idepargne, 'enseignant_idenseignant' => $model->enseignant_idenseignant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="epargne-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
