<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    $debut = date('Y-m-d', strtotime(str_replace('-','/', $fdebut)));
    
    // Requête de mise à jour.
    $reqSQL = 'INSERT INTO prestation
               VALUES("'.$client_id.'","'.$contrat_id.'",
                      "'.$fformule_id.'","'.$debut.'",NULL,NULL);';
    
    // Exécution de la requête.
    connexion($reqSQL, 'insert');
    
    $reqSQL = 'SELECT contrat_id
               FROM contrat
               ORDER BY contrat_id DESC LIMIT 1;';
    
    // Exécution de la requête.
    $resSQL = connexion($reqSQL, 'select');
    $ligneSQL = $resSQL->fetch();
    
    header ('location:clients.php?ajout_client_id='.$client_id);
?>