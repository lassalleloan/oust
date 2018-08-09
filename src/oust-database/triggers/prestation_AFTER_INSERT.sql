CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`prestation_AFTER_INSERT` AFTER INSERT ON `prestation` FOR EACH ROW
BEGIN
	UPDATE client
		SET last_update = CURRENT_TIMESTAMP
        WHERE client_id = NEW.client_id;
END