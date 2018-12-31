<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EpargneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Epargnes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="epargne-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Epargne', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idepargne',
            'montant',
            'session',
            'enseignant_idenseignant',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
