CREATE VIEW `current_mission` AS
    SELECT 
        c.nom,
        c.prenom,
        c.adresse_rue,
        c.adresse_numero,
        c.adresse_code_postal,
        loc.localite,
        com.commune,
        com.canton,
        dech.dechetterie
    FROM
        localite AS loc
            INNER JOIN
        commune AS com ON loc.commune_id = com.commune_id
            INNER JOIN
        dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id
            INNER JOIN
        client AS c ON loc.localite_id = c.localite_id
    WHERE
        TIMESTAMPDIFF(DAY, c.prochain_passage, CURRENT_TIMESTAMP) = 0;