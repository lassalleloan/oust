<?php
    include ('includes/include.php');

    extract(@$_GET);
    
    $reqSQL = 'UPATE client
               SET boite_id=NULL
               WHERE boite_id="'.$boite_id.'";';
    
    $reqSQL = 'DELETE
               FROM boite
               WHERE boite_id="'.$boite_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:boites.php?suppr_boite_id='.$boite_id);
?>