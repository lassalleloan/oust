CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`boite_BEFORE_INSERT` BEFORE INSERT ON `boite` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	SET NEW.etat = 'en stock';
    SET NEW.client_id = NULL;
    SET NEW.date_pret = NULL;
    SET NEW.date_retour = NULL;
END