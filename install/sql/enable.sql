SET @sName = 'co_flowers';
SET @sPath = 'company/flowers/';

-- SETTINGS

INSERT INTO `sys_options_types`(`group`, `name`, `caption`, `icon`, `order`) VALUES 
('templates', @sName, '_co_flowers_stg_cpt_type', CONCAT(@sName, '@modules/', @sPath, '|std-mi.png'), 2);
SET @iTypeId = LAST_INSERT_ID();

INSERT INTO `sys_options_categories`(`type_id`, `name`, `caption`, `order`) VALUES 
(@iTypeId, CONCAT(@sName, '_system'), '_co_flowers_stg_cpt_category_system', 1);
SET @iCategoryId = LAST_INSERT_ID();

INSERT INTO `sys_options`(`category_id`, `name`, `caption`, `value`, `type`, `extra`, `check`, `check_error`, `order`) VALUES
(@iCategoryId, CONCAT(@sName, '_switcher_title'), '_co_flowers_stg_cpt_option_switcher_name', 'Flowers', 'digit', '', '', '', 1);

SET @iSystemCategoryId = (SELECT IFNULL(`id`, @iCategoryId) FROM `sys_options_categories` WHERE `name`='system' LIMIT 1);
SET @iSystemCategoryOrder = (SELECT IFNULL(MAX(`order`), 0) FROM `sys_options` WHERE `category_id`=@iSystemCategoryId LIMIT 1);
INSERT INTO `sys_options`(`category_id`, `name`, `caption`, `value`, `type`, `extra`, `check`, `check_error`, `order`) VALUES
(@iSystemCategoryId, CONCAT(@sName, '_site_logo'), '', '0', 'digit', '', '', '', @iSystemCategoryOrder + 1),
(@iSystemCategoryId, CONCAT(@sName, '_site_logo_alt'), '', '', 'text', '', '', '', @iSystemCategoryOrder + 2),
(@iSystemCategoryId, CONCAT(@sName, '_site_logo_width'), '', '240', 'digit', '', '', '', @iSystemCategoryOrder + 3),
(@iSystemCategoryId, CONCAT(@sName, '_site_logo_height'), '', '48', 'digit', '', '', '', @iSystemCategoryOrder + 4);

