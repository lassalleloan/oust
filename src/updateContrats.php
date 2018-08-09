<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
    
    if ($fdate_resiliation == "")
    {
        $reqSQL = 'UPDATE contrat
                   SET mode_paiement="'.$fmode_paiement.'",
                       paye="'.$fpaye.'"
                       WHERE contrat_id='.$contrat_id.';';
    }
    else
    {
        // Requête de mise à jour.
        $reqSQL = 'UPDATE contrat
                   SET date_resiliation="'.$fdate_resiliation.'",
                       mode_paiement="'.$fmode_paiement.'",
                       paye="'.$fpaye.'"
                       WHERE contrat_id='.$contrat_id.';';
    }
				   
    // Exécution de la requête.
    connexion($reqSQL, 'update');
    
    // Redirection.
    header ('location:contrats.php?mod_contrat_id='.$contrat_id);
?>