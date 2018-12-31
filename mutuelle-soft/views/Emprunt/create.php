<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = 'Create Emprunt';
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprunt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
