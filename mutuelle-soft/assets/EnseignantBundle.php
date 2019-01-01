<?php
/**
 * Created by PhpStorm.
 * User: SCrf1
 * Date: 29/12/2018
 * Time: 02:45
 */

namespace app\assets;
use yii\web\AssetBundle;

class EnseignantBundle extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/enseignants.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}