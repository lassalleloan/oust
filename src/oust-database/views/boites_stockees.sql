CREATE VIEW `boites_stockees` AS
    SELECT 
        format_boite, prix
    FROM
        boite
    WHERE
        client_id IS NULL;