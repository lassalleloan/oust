<?php
    include ('includes/include.php');

    extract(@$_GET);

    // Requête de suppression.
    $reqSQL = 'DELETE
               FROM mission
               WHERE employe_id="'.$employe_id.'";';
               
    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    
    $reqSQL = 'DELETE
               FROM employe
               WHERE employe_id="'.$employe_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:employes.php?suppr_employe_id='.$employe_id);
?>