CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`vehicule_BEFORE_INSERT` BEFORE INSERT ON `vehicule` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
END
