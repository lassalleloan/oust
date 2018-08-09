CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`contrat_BEFORE_UPDATE` BEFORE UPDATE ON `contrat` FOR EACH ROW
BEGIN   
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	IF (OLD.date_resiliation <> NULL) THEN
		SIGNAL SQLSTATE '44000'
			SET MESSAGE_TEXT = 'UPDATE is not allowed when contrat.date_resiliation is already set';
	ELSEIF (OLD.date_creation <> NEW.date_creation) THEN
			SIGNAL SQLSTATE '44000'
				SET MESSAGE_TEXT = 'UPDATE of contrat.date_creation is not allowed';
	ELSEIF ((NEW.paye = 0 AND NEW.mode_paiement <> 'aucun')
			OR (NEW.paye <> 0 AND NEW.mode_paiement = 'aucun')) THEN
			SIGNAL SQLSTATE '44000'
				SET MESSAGE_TEXT = 'invalid data for contrat.paye and contrat.mode_paiement';
    END IF;
END