<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    // Requête de mise à jour.
    $reqSQL = 'UPDATE vehicule
               SET plaque="'.$fplaque.'",
                   modele="'.$fmodele.'",
                   kilometrage='.$fkilometrage.'
				   WHERE vehicule_id='.$vehicule_id.';';
				   
    // Exécution de la requête.
    connexion($reqSQL, 'update');
    
    // Redirection.
    header ('location:vehicules.php?mod_vehicule_id='.$vehicule_id);
?>