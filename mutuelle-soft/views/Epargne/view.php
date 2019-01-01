<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = $model->idepargne;
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="epargne-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idepargne' => $model->idepargne, 'enseignant_idenseignant' => $model->enseignant_idenseignant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idepargne' => $model->idepargne, 'enseignant_idenseignant' => $model->enseignant_idenseignant], [
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
            'idepargne',
            'montant',
            'session',
            'enseignant_idenseignant',
        ],
    ]) ?>

</div>
