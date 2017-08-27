<?php
/**
 * Copyright (c) Company - https://example.com
 * 
 *
 * @defgroup    CoFlowers Flowers Template from Company
 * @ingroup     UnaModules
 *
 * @{
 */

$aConfig = array(
    /**
     * Main Section.
     */
    'type' => BX_DOL_MODULE_TYPE_TEMPLATE,
    'name' => 'co_flowers',
    'title' => 'Flowers',
    'note' => 'Flowers template',
    'version' => '1.0.0',
    'vendor' => 'Company',
	'help_url' => 'http://example.com/?section={module_name}',

    'compatible_with' => array(
        '9.0.x'
    ),

    /**
     * 'home_dir' and 'home_uri' - should be unique. Don't use spaces in 'home_uri' and the other special chars.
     */
    'home_dir' => 'company/flowers/',
    'home_uri' => 'flowers',

    'db_prefix' => 'co_flowers_',
    'class_prefix' => 'CoFlowers',

    /**
     * Category for language keys.
     */
    'language_category' => 'Company Flowers',

    /**
     * Installation/Uninstallation Section.
     */
    'install' => array(
        'execute_sql' => 1,
        'update_languages' => 1,
    	'clear_db_cache' => 1
    ),
    'uninstall' => array (
        'execute_sql' => 1,
        'update_languages' => 1,
    	'clear_db_cache' => 1
    ),
    'enable' => array(
        'execute_sql' => 1
    ),
    'disable' => array(
        'execute_sql' => 1
    ),

    /**
     * Dependencies Section
     */
    'dependencies' => array(),
);

/** @} */
