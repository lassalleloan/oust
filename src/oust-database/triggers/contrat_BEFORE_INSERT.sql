CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`contrat_BEFORE_INSERT` BEFORE INSERT ON `contrat` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
	SET NEW.date_creation = CURRENT_TIMESTAMP;
	SET NEW.date_resiliation = NULL;
    
    IF ((NEW.paye = 0 AND NEW.mode_paiement <> 'aucun')
		OR (NEW.paye <> 0 AND NEW.mode_paiement = 'aucun')) THEN
			SIGNAL SQLSTATE '44000'
				SET MESSAGE_TEXT = 'invalid data for contrat.paye and contrat.mode_paiement';
    END IF;
END