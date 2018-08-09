<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    // Requête de mise à jour.
    $reqSQL = 'INSERT INTO contrat
               VALUES(NULL,"'.$fdate_creation.'",NULL,
                      "'.$fmode_paiement.'","'.$fpaye.'",NULL);';
    
    // Exécution de la requête.
    connexion($reqSQL, 'insert');
    
    $reqSQL = 'SELECT contrat_id
               FROM contrat
               ORDER BY contrat_id DESC LIMIT 1;';
    
    // Exécution de la requête.
    $resSQL = connexion($reqSQL, 'select');
    $ligneSQL = $resSQL->fetch();
    
    if (!isset($client_id))
        header ('location:contrats.php?ajout_contrat_id='.$ligneSQL['contrat_id']);
    else
        header ('location:prestations.php?contrat_id='.$ligneSQL['contrat_id'].'&client_id='.$client_id);
?>