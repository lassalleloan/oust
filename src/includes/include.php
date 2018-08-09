<?php
    // Connexion ($requete, $type_req).
    // Entrée : $requete (requéte à exécuter) $type_req (type de requete).
    // Sortie : tableau associatif contenant les résultats.
     
    session_start();
     
    function connexion($requete, $type_req)
    {
        try
        {
            // Connexion au serveur MySQL et à la base de données
            $connexion = new PDO('mysql:host=localhost; dbname=oust','root', 'root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            // Gestion de l'erreur.
            echo 'Une erreur est survenue lors de la connexion à la base de données.'.$e->getMessage();
            die();		
        }
        
        // Exécution de la requête.
        if ($type_req == 'select')
        {
            // Exécution d'une requête SELECT.
            $resultats = $connexion->query("$requete");
        }
        else
        {
            // Exécution d'une requête non SELECT.
            $resultats = $connexion->exec("$requete");
        }
        
        return $resultats;
    }
    
    function timestampToDate($timestamp)
    {     
        $date = date('d.m.Y', strtotime(str_replace('-','/', $timestamp)));
        if ($date == '01.01.1970')
            $date = '';
        
        return $date;
    }
?>