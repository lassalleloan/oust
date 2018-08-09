<?php
    include ('includes/include.php');

    extract(@$_GET);

    // Requête de suppression.
    $reqSQL = 'DELETE
               FROM prestation
               WHERE client_id="'.$client_id.'";';
               
    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    
    $reqSQL = 'DELETE
               FROM client
               WHERE client_id="'.$client_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:clients.php?suppr_client_id='.$client_id);
?>