CREATE VIEW `dechetteries_client` AS
    SELECT 
        cl.nom,
        cl.prenom,
        cl.adresse_rue,
        cl.adresse_numero,
        cl.adresse_code_postal,
        loc.localite,
        com.commune,
        com.canton,
        dech.dechetterie
    FROM
        client AS cl
            INNER JOIN
        localite AS loc ON cl.localite_id = loc.localite_id
            INNER JOIN
        commune AS com ON loc.commune_id = com.commune_id
            INNER JOIN
        dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id;