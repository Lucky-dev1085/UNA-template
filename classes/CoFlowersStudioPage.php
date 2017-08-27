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

class CoFlowersStudioPage extends BxTemplStudioDesign
{
    function __construct($sModule = "", $sPage = "")
    {
    	$this->MODULE = 'co_flowers';
        parent::__construct($sModule, $sPage);
    }
}

/** @} */
