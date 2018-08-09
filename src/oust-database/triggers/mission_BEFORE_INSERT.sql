CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`mission_BEFORE_INSERT` BEFORE INSERT ON `mission` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
	SET NEW.mission_id = CURRENT_TIMESTAMP;

	UPDATE vehicule 
	SET 
		kilometrage = kilometrage + NEW.distance_parcourue_km
	WHERE
		vehicule_id = NEW.vehicule_id;
END