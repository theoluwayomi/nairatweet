ALTER TABLE `plans` CHANGE `cycle` `cycle` INT(3) NOT NULL DEFAULT '30';
INSERT INTO `plans` (`id`, `name`, `amount`, `returns`, `cycle`, `created_at`, `updated_at`) VALUES (NULL, 'Free Trial', '0.00', '100', '15', NULL, NULL);
ALTER TABLE `wallets` ADD `trial` ENUM('open','closed') NOT NULL DEFAULT 'open' AFTER `balance`;






