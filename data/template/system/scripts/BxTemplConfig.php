<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) Company - https://example.com
 * 
 *
 * @defgroup    UnaTemplate UNA Template Classes
 * @{
 */

class BxTemplConfig extends BxBaseConfig
{
    function __construct()
    {
        parent::__construct();

        $this->_aConfig['aLessConfig'] = array_merge($this->_aConfig['aLessConfig'], array(
            'bx-page-width' => '1000px',
        ));
    }
}

/** @} */
