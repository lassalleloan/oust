CREATE VIEW `client_mission_current` AS
    SELECT 
        c.nom AS nom_client,
        c.prenom,
        c.adresse_rue,
        c.adresse_numero,
        c.adresse_code_postal,
        loc.nom AS localite,
        com.nom AS commune,
        com.canton,
        dech.nom AS dechetterie
    FROM
        localite AS loc
            INNER JOIN
        commune AS com ON loc.commune_id = com.commune_id
            INNER JOIN
        dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id
            INNER JOIN
        client AS c ON loc.localite_id = c.localite_id
    WHERE
         TIMESTAMPDIFF(day, c.prochain_passage, CURRENT_TIMESTAMP) = 0;