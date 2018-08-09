<?php
    include ('includes/include.php');

    extract(@$_GET);
	
    // Requête de suppression.
    $reqSQL = 'DELETE
               FROM prestation
               WHERE contrat_id="'.$contrat_id.'";';
               
    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    
    $reqSQL = 'DELETE
               FROM contrat
               WHERE contrat_id="'.$contrat_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:contrats.php?suppr_contrat_id='.$contrat_id);
?>