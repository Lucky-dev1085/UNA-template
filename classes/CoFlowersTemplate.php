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

bx_import('BxBaseModGeneralTemplate');

class CoFlowersTemplate extends BxBaseModGeneralTemplate
{
    function __construct(&$oConfig, &$oDb)
    {
        $this->MODULE = 'co_flowers';
        parent::__construct($oConfig, $oDb);
    }
}

/** @} */
