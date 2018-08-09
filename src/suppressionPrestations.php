<?php
    include ('includes/include.php');

    extract(@$_GET);

    // Requête de suppression.
    $reqSQL = 'DELETE
               FROM prestation
               WHERE client_id="'.$client_id.'" AND contrat_id="'.$contrat_id.'";';
               
    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    

    // Redirection.
    header ('location:affichePrestations.php?suppr_prestation_id='.$client_id);
?>