CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`boite_BEFORE_UPDATE` BEFORE UPDATE ON `boite` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	IF (OLD.etat = 'achetée') THEN
		SIGNAL SQLSTATE '44000'
            SET MESSAGE_TEXT = 'invalid data';
	ELSEIF (NEW.etat = 'en stock' OR NEW.etat = 'achetée') THEN
		SET NEW.date_pret = NULL;
		SET NEW.date_retour = NULL;
	ELSEIF (NEW.etat = 'louée') THEN
		SET NEW.date_pret = CURRENT_TIMESTAMP;
		SET NEW.date_retour = DATE_ADD(NEW.date_pret, INTERVAL 3 month);
	END IF;
END