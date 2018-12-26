<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 24/12/2018
 * Time: 13:14
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Countries</h1>
    <ul>
        <?php foreach ($countries as $country): ?>
            <li>
                <?= Html::encode("{$country->name} ({$country->code})") ?>:
                <?= $country->population ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?= LinkPager::widget(['pagination' => $pagination]) ?>