<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) Company - https://example.com
 * 
 *
 * @defgroup    CoFlowers Flowers Template from Company
 * @ingroup     UnaModules
 *
 * @{
 */

bx_import('BxBaseModTemplateConfig');

class CoFlowersConfig extends BxBaseModTemplateConfig
{
    function __construct($aModule)
    {
        parent::__construct($aModule);

        $this->_aPrefixes = array(
        	'option' => 'co_flowers_'
        );
    }
}

/** @} */
