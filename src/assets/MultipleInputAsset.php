<?php

/**
 * @link https://github.com/gromovfjodor/yii2-multiple-input
 * @copyright Copyright (c) 2014 gromovfjodor
 * @license https://github.com/gromovfjodor/yii2-multiple-input/blob/master/LICENSE.md
 */

namespace gromovfjodor\multipleinput\assets;

use yii\web\AssetBundle;

/**
 * Class MultipleInputAsset
 * @package gromovfjodor\multipleinput\assets
 */
class MultipleInputAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/src/';

        $this->js = [
            YII_DEBUG ? 'js/jquery.multipleInput.js' : 'js/jquery.multipleInput.min.js'
        ];

        $this->css = [
            YII_DEBUG ? 'css/multiple-input.css' : 'css/multiple-input.min.css'
        ];

        parent::init();
    }


} 