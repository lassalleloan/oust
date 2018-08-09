CREATE VIEW `dechetteries` AS
    SELECT 
        dech.dechetterie,
        loc.localite,
        com.commune,
        com.canton
    FROM
        localite AS loc
            INNER JOIN
        dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id
            INNER JOIN
        commune AS com ON loc.commune_id = com.commune_id;