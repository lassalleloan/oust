CREATE VIEW `acces_autorises` AS
    SELECT 
        employe.nom,
        employe.prenom,
        employe.nom_utilisateur,
        droits_acces.droits_acces,
        droits_acces.details_droits
    FROM
        employe
            INNER JOIN
        droits_acces ON employe.droits_acces_id = droits_acces.droits_acces_id;