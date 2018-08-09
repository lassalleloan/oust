CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`formule_BEFORE_INSERT` BEFORE INSERT ON `formule` FOR EACH ROW
BEGIN   
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	IF (NEW.duree_mois < 1 OR NEW.nombre_passage_mois < 1) THEN
			SIGNAL SQLSTATE '44000'
				SET MESSAGE_TEXT = 'invalid data';
	END IF;
END