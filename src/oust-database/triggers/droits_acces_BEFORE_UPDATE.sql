CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`droits_acces_BEFORE_UPDATE` BEFORE UPDATE ON `droits_acces` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
END