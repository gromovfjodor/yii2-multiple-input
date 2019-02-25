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
class MultipleInputSortableAsset extends AssetBundle
{
    public $depends = [
        'gromovfjodor\multipleinput\assets\MultipleInputAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/src/';

        $this->js = [
            YII_DEBUG ? 'js/jquery-sortable.js' : 'js/jquery-sortable.min.js'
        ];

        $this->css = [
            YII_DEBUG ? 'css/sorting.css' : 'css/sorting.min.css'
        ];

        parent::init();
    }
} 