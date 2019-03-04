<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'stylesheets/slick.css',
        'stylesheets/owl.carousel.css',
        'stylesheets/font-awesome.min.css',
    ];
    public $js = [
        'js/slick.js',
        'js/init.js',
        'js/owl.carousel.min.js',
    ];
    public $jsOptions = [
        'async' => 'async',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
