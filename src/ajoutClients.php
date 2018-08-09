<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    if ($fgps_latitude == "")
        $fgps_latitude = 0;
    
    if ($fgps_longitude == "")
        $fgps_longitude = 0;
    
    // Requête de mise à jour.
    $reqSQL = 'INSERT INTO client
               VALUES(NULL,"'.$fnom.'","'.$fprenom.'","'.$fadresse_rue.'",
                      "'.$fadresse_numero.'","'.$fadresse_code_postal.'",
                      "'.$flocalite_id.'","'.$fgps_longitude.'","'.$fgps_latitude.'",
                      "'.$fno_telephone.'","'.$femail.'","'.$fiban.'",NULL,
                      "'.$fjour_collect.'","'.$fremarques.'",NULL);';
    
    // Exécution de la requête.
    connexion($reqSQL, 'insert');
    
    $reqSQL = 'SELECT client_id
               FROM client
               ORDER BY client_id DESC LIMIT 1;';
    
    // Exécution de la requête.
    $resSQL = connexion($reqSQL, 'select');
    $ligneSQL = $resSQL->fetch();
    
    if (!isset($contrat))
    {
        // Redirection.
        header ('location:clients.php?ajout_client_id='.$ligneSQL['client_id']);
    }
    else
    {
        // Redirection.
        header ('location:gestionContrats.php?client_id='.$ligneSQL['client_id']);
    }
?>