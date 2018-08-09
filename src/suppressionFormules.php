<?php
    include ('includes/include.php');

    extract(@$_GET);
    
    $reqSQL = 'DELETE
               FROM prestation
               WHERE formule_id="'.$formule_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');
    
    $reqSQL = 'DELETE
               FROM formule
               WHERE formule_id="'.$formule_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:formules.php?suppr_formule_id='.$formule_id);
?>