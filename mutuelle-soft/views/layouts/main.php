<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use \app\assets\EnseignantBundle;
// TODO (1) Changer le syle de main.php

AppAsset::register($this);
EnseignantBundle::register($this);

$this->title = "";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        nav #w0-collapse li a:focus, nav #w0-collapse li a:hover
        {
            color: #fcd032 !important;
        }
        .footer
        {
            position: fixed;
            bottom: 0;
        }
        .content
        {
            position: relative;
            top: 50px
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div>
    <?php
    NavBar::begin([
        'brandLabel' => "Mutuelle enseignant",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $navItems=[
        ['label' => 'Enseignant', 'url' => ['/site/listemembres']],
        ['label' => 'Emprunts', 'url' => ['/site/listeemprunts']],
        ['label' => 'Remboursements', 'url' => ['/site/listeremboursements']],
        ['label' => 'Epargnes', 'url' => ['/site/listeepargnes']],
        ['label' => 'Fonds sociaux', 'url' => ['/site/fonds']],
        ['label' => '', 'url' => ['/site/parametres'], 'icon' => '../../web/'],
    ];
    if (Yii::$app->user->isGuest){
        array_push($navItems, ['label' => 'Connexion', 'url' => ['/user/login']], ['label' => 'Inscription', 'url' => ['/user/register']]);
    } else {
        array_push($navItems, ['label' => 'Déconnexion (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]);
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
<!--        --><?//= $content ?>
    </div>

</div>

<div class="container content">
    <?= $content ?>
</div>


<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
