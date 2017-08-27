SET @sName = 'co_flowers';

-- SETTINGS

DELETE FROM `top`, `toc`, `to` USING `sys_options_types` AS `top` LEFT JOIN `sys_options_categories` AS `toc` ON `top`.`id`=`toc`.`type_id` LEFT JOIN `sys_options` AS `to` ON `toc`.`id`=`to`.`category_id` WHERE `top`.`name`=@sName;
DELETE FROM `sys_options` WHERE `name` IN (CONCAT(@sName, '_site_logo'), CONCAT(@sName, '_site_logo_alt'), CONCAT(@sName, '_site_logo_width'), CONCAT(@sName, '_site_logo_height'));

