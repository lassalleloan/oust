<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
	

	if ($fpret == ""){$fpret = CURRENT_TIMESTAMP;}
        
	else{
		$chaine1 = "\"";
		$fpret = $chaine1.$fpret.$chaine1;
		
		}

    // Requête de mise à jour.
    $reqSQL = 'UPDATE boite
               SET format_boite="'.$fformat.'",
				   client_id="'.$fclient_id.'",
                   prix="'.$fprix.'",
                   etat="'.$fetat.'",
                   date_pret='.$fpret.'
				   WHERE boite_id="'.$boite_id.'";';
				   
    // Exécution de la requête.
    connexion($reqSQL, 'update');

	
    
    // Redirection.
    header ('location:boites.php?mod_boite_id='.$boite_id);
?>