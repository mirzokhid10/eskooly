<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BootsAsset extends AssetBundle
{
    public $basePath = '@webroot/assets/boots';
    public $baseUrl = '@web/assets/boots';

    public $css = [
        'modules/bootstrap/css/bootstrap.min.css',
        'modules/fontawesome/css/all.min.css',
        'modules/jqvmap/dist/jqvmap.min.css',
        'modules/summernote/summernote-bs4.css',
        'modules/owlcarousel2/dist/assets/owl.carousel.min.css',
        'modules/owlcarousel2/dist/assets/owl.theme.default.min.css',
        'css/style.css',
        'css/components.css',
    ];

    public $js = [
        // General JS Scripts
        'modules/jquery.min.js',
        'modules/popper.js',
        'modules/tooltip.js',
        'modules/bootstrap/js/bootstrap.min.js',
        'modules/nicescroll/jquery.nicescroll.min.js',
        'modules/moment.min.js',
        'js/stisla.js',

        // JS Libraries
        'modules/jquery.sparkline.min.js',
        'modules/chart.min.js',
        'modules/owlcarousel2/dist/owl.carousel.min.js',
        'modules/summernote/summernote-bs4.js',
        'modules/chocolat/dist/js/jquery.chocolat.min.js',

        // Page Specific JS File
        'js/page/index.js',

        // Template JS File
        'js/scripts.js',
        'js/custom.js',
    ];

    public $depends = [
        // These files often depend on basic jQuery and Bootstrap functionality.
        // Yii2 usually provides these through its core bundles,
        // but if your included bootstrap and jquery files cause conflicts,
        // you might remove the dependencies below. For now, assume you might need them:
         'yii\web\YiiAsset',
//         'yii\web\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}