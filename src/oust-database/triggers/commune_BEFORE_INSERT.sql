CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`commune_BEFORE_INSERT` BEFORE INSERT ON `commune` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
END
