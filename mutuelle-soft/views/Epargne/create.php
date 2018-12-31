<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = 'Create Epargne';
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="epargne-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
