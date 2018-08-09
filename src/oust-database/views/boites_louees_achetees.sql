CREATE VIEW `boites_louees_achetees` AS
    SELECT 
        c.nom, c.prenom, b.format_boite, b.prix, b.etat
    FROM
        boite AS b
            INNER JOIN
        client AS c ON b.client_id = c.client_id
    WHERE
        b.client_id IS NOT NULL;