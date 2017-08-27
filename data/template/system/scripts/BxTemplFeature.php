<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) Company - https://example.com
 * 
 *
 * @defgroup    UnaTemplate UNA Template Classes
 * @{
 */

/**
 * @see BxDolFeature
 */
class BxTemplFeature extends BxBaseFeature
{
    function __construct($sSystem, $iId, $iInit = true, $oTemplate = false)
    {
        parent::__construct($sSystem, $iId, $iInit, $oTemplate);
    }
}

/** @} */
