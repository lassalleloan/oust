CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`prestation_BEFORE_INSERT` BEFORE INSERT ON `prestation` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	SET @duree = (SELECT duree_mois
					FROM formule
					WHERE formule_id = NEW.formule_id
				);
                    
	SET NEW.fin = DATE_ADD(NEW.debut, INTERVAL @duree month);
END