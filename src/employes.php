<!DOCTYPE html>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
       // header('location:index.php?qError=usernamePassword');
       // exit();
    }
    
    extract(@$_GET);
?>

<html lang="fr">
    <head>
        <title>Oust - Employ&eacutes</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="employes">
            <h2>Employ&eacutes</h2>
            <hr>
            <?php
                if (isset($ajout_employe_id))
                {
                    echo '<p id="erreur">
                            L\'employé '.$ajout_employe_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_employe_id))
                {
                    echo '<p id="erreur">
                            L\'employé '.$mod_employe_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_employe_id))
                {
                    echo '<p id="erreur">
                            L\'employé '.$suppr_employe_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>Nom</th>
                    <th>Pr&eacutenom</th>
                    <th>Rue</th>
					<th>N&deg</th>
                    <th>NPA</th>
                    <th>Localit&eacute</th>
                    <th>T&eacutel&eacutephone</th>
                    <th>Email</th>
                    <th>Nom d'utilisateur</th>
                    <th>Droits d'accès</th>
                    <th>Remarques</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM employe AS e
                               INNER JOIN localite AS l
                               ON e.localite_id = l.localite_id
                               INNER JOIN droits_acces AS d
                               ON e.droits_acces_id = d.droits_acces_id
							   ORDER BY nom';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr >
                                <td>'.$ligneSQL['nom'].'</td>
                                <td>'.$ligneSQL['prenom'].'</td>
                                <td>'.$ligneSQL['adresse_rue'].'</td>
                                <td>'.$ligneSQL['adresse_numero'].'</td>
                                <td>'.$ligneSQL['adresse_code_postal'].'</td>
                                <td>'.$ligneSQL['localite'].'</td>
                                <td>'.$ligneSQL['no_telephone'].'</td>
                                <td>'.$ligneSQL['email'].'</td>
                                <td>'.$ligneSQL['nom_utilisateur'].'</td>
                                <td>'.$ligneSQL['droits_acces'].'</td>
                                <td>'.$ligneSQL['remarques'].'</td>
                                <td>
                                    <a href="gestionEmployes.php?employe_id='.$ligneSQL['employe_id'].'"">
                                        Modifier
                                    </a>
                                    <br/>
                                    <a href="suppressionEmployes.php?employe_id='.$ligneSQL['employe_id'].'">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>
