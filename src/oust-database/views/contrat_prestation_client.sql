CREATE VIEW `contrat_prestation_client` AS
    SELECT 
        cl.nom,
        cl.prenom,
        co.date_creation,
        co.date_resiliation,
        co.mode_paiement,
        co.paye,
        pr.debut,
        pr.fin,
        fo.type,
        fo.duree_mois,
        fo.prix,
        fo.nombre_passage_mois
    FROM
        prestation AS pr
            INNER JOIN
        client AS cl ON pr.client_id = cl.client_id
            INNER JOIN
        contrat AS co ON pr.contrat_id = co.contrat_id
            INNER JOIN
        formule AS fo ON pr.formule_id = fo.formule_id;