<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    if ($fgps_latitude == "")
        $fgps_latitude = 0;
    
    if ($fgps_longitude == "")
        $fgps_longitude = 0;

    // Requête de mise à jour.
    $reqSQL = 'UPDATE client
               SET nom="'.$fnom.'",
                   prenom="'.$fprenom.'",
                   adresse_rue="'.$fadresse_rue.'",
                   adresse_numero="'.$fadresse_numero.'",
                   adresse_code_postal="'.$fadresse_code_postal.'",
                   no_telephone="'.$fno_telephone.'",
                   email="'.$femail.'",
                   iban="'.$fiban.'",
                   jour_collect="'.$fjour_collect.'",
                   gps_latitude='.$fgps_latitude.',
                   gps_longitude='.$fgps_longitude.',
                   remarques="'.$fremarques.'" WHERE client_id="'.$client_id.'";';

    // Exécution de la requête.
    connexion($reqSQL, 'update');
    
    // Redirection.
    header ('location:clients.php?mod_client_id='.$client_id);
?>