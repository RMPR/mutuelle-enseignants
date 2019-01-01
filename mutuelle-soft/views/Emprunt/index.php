<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpruntSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprunts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprunt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emprunt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idemprunt',
            'montant',
            'session',
            'interet',
            'databutoir',
            //'enseignant_idenseignant',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
