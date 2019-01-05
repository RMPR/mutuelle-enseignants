<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
        'css/epargnes.css',
        'css/remboursement.css',
        'css/emprunts.css',
        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/mdbpro.css'
    ];
    public $js = [
        'js/epargnes.js',
        'js/compiled.min.js',
        'js/main.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery-3.3.1.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];

}
