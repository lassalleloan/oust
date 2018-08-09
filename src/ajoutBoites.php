<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);
    extract(@$_GET);
   
    // Requête de mise à jour.
    $reqSQL = 'INSERT INTO boite
               VALUES(NULL,"'.$fformat.'", '.$fprix.', NULL,
                      NULL,NULL,NULL,NULL);';
    
	echo $reqSQL;
    // Exécution de la requête.
    connexion($reqSQL, 'insert');
    
    $reqSQL = 'SELECT boite_id
               FROM boite
               ORDER BY boite_id DESC LIMIT 1;';
    
    // Exécution de la requête.
    $resSQL = connexion($reqSQL, 'select');
    $ligneSQL = $resSQL->fetch();
    
	header ('location:boites.php?ajout_boite_id='.$ligneSQL['boite_id'].'');
?>