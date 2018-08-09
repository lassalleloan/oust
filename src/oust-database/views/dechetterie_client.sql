CREATE VIEW `dechetterie_client` AS
    SELECT 
        cl.nom,
        cl.prenom,
        cl.adresse_rue,
        cl.adresse_numero,
        cl.adresse_code_postal,
        loc.nom AS localite,
        com.nom AS commune,
        com.canton AS canton,
        dech.nom AS dechetterie
    FROM
        client AS cl
            INNER JOIN
        localite AS loc ON cl.localite_id = loc.localite_id
            INNER JOIN
        commune AS com ON loc.commune_id = com.commune_id
            INNER JOIN
        dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id;