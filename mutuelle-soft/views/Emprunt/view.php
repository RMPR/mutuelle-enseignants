<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = $model->idemprunt;
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="emprunt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idemprunt' => $model->idemprunt, 'enseignant_idenseignant' => $model->enseignant_idenseignant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idemprunt' => $model->idemprunt, 'enseignant_idenseignant' => $model->enseignant_idenseignant], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idemprunt',
            'montant',
            'session',
            'interet',
            'databutoir',
            'enseignant_idenseignant',
        ],
    ]) ?>

</div>
