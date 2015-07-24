ALTER TABLE `users` ADD `can_rent` TINYINT(1)  NOT NULL  DEFAULT '1'  COMMENT 'ecommerce'  AFTER `has_accepted_terms`;
ALTER TABLE `virtual_users` ADD `can_rent` TINYINT(1)  NOT NULL  DEFAULT '1'  COMMENT 'ecommerce'  AFTER `has_accepted_terms`;

