CREATE DEFINER = CURRENT_USER TRIGGER `oust`.`client_BEFORE_INSERT` BEFORE INSERT ON `client` FOR EACH ROW
BEGIN
	SET NEW.last_update = CURRENT_TIMESTAMP;
    
	SET @nbr_passage = 4 - (SELECT nombre_passage_mois
								FROM prestation AS pr
									INNER JOIN client AS cl
										ON pr.client_id = NEW.client_id
									INNER JOIN contrat AS co
										ON pr.client_id = co.contrat_id
									INNER JOIN formule AS fo
										ON pr.formule_id = fo.formule_id
								WHERE co.date_resiliation IS NULL
							);
                                
	SET NEW.prochain_passage = DATE_ADD(nextDayOfWeek(CURRENT_TIMESTAMP, NEW.jour_collect), INTERVAL @nbr_passage week);
END