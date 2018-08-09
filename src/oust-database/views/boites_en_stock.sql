CREATE VIEW `boites_en_stock` AS
    SELECT 
        format_boite, prix
    FROM
        boite
    WHERE
        client_id IS NULL;