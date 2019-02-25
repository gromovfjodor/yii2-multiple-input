<?php

/**
 * @link https://github.com/gromovfjodor/yii2-multiple-input
 * @copyright Copyright (c) 2014 gromovfjodor
 * @license https://github.com/gromovfjodor/yii2-multiple-input/blob/master/LICENSE.md
 */

namespace gromovfjodor\multipleinput\renderers;


/**
 * Interface RendererInterface
 * @package gromovfjodor\multipleinput\renderers
 */
interface RendererInterface
{
    const POS_HEADER    = 'header';
    const POS_ROW       = 'row';
    const POS_ROW_BEGIN = 'row_begin';
    const POS_FOOTER    = 'footer';

    const THEME_DEFAULT = 'default';
    const THEME_BS      = 'bootstrap';

    /**
     * Renders the widget's content.
     *
     * @return mixed
     */
    public function render();

    /**
     * Set current context.
     * 
     * @param mixed $context
     * @return mixed
     */
    public function setContext($context);

    /**
     * Returns a placeholder.
     *
     * @return string
     */
    public function getIndexPlaceholder();
}