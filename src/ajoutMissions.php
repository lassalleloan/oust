<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    // Requête de mise à jour.
    $reqSQL = 'INSERT INTO mission
               VALUES(NULL,"'.$flocalite_id.'","'.$femploye_id.'",
                      "'.$fvehicule_id.'","'.$fduree_heure.'","'.$distance_parcourue_km.'"
                      ,"'.$fremarques.'",NULL);';
    
    // Exécution de la requête.
    connexion($reqSQL, 'insert');
    
    $reqSQL = 'SELECT mission_id
               FROM mission
               ORDER BY mission_id DESC LIMIT 1;';
    
    // Exécution de la requête.
    $resSQL = connexion($reqSQL, 'select');
    $ligneSQL = $resSQL->fetch();
    
    header ('location:missions.php?ajout_mission_id='.$ligneSQL['mission_id']);
?>