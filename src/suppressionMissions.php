<?php
    include ('includes/include.php');

    extract(@$_GET);
    
    $reqSQL = 'DELETE
               FROM mission
               WHERE mission_id="'.$mission_id.'"
               AND employe_id="'.$employe_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'delete');

    // Redirection.
    header ('location:missions.php?suppr_mission_id='.$mission_id);
?> 