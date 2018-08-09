<!DOCTYPE HTML>
<?php
    include ('includes/include.php');

    // Récupère les données du formulaire
    extract(@$_POST);

    // Selectionne les informations de l'employé correspondant
    $reqSQL = 'SELECT *
               FROM employe
               WHERE nom_utilisateur="'.$fnom_utilisateur.'"
               AND mot_passe="'.$fmot_passe.'";';

    $resSQL = connexion($reqSQL, 'select');
    if ($ligneSQL = $resSQL->fetch())
    {
        $_SESSION['semploye_id'] = $ligneSQL['employe_id'];
        $_SESSION['snom'] = $ligneSQL['nom'];
        $_SESSION['sprenom'] = $ligneSQL['prenom'];

        header('location:accueil.php');
    }
    else
    {
        header('location:index.php?qError=usernamePassword');
    }
?> 