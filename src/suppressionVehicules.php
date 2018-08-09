<?php
    include ('includes/include.php');

    extract(@$_GET);
	
    // Requête de suppression.
    $reqSQL = 'DELETE
               FROM mission
               WHERE vehicule_id="'.$vehicule_id.'";';
               
    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    
    $reqSQL = 'DELETE
               FROM vehicule
               WHERE vehicule_id="'.$vehicule_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:vehicules.php?suppr_vehicule_id='.$vehicule_id);
?>