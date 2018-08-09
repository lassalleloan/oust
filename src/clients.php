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
        <title>Oust - Client</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="clients">
            <h2>Clients</h2>
            <hr>
            <?php
                if (isset($ajout_client_id))
                {
                    echo '<p id="erreur">
                            Le client '.$ajout_client_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_client_id))
                {
                    echo '<p id="erreur">
                            Le client '.$mod_client_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_client_id))
                {
                    echo '<p id="erreur">
                            Le client '.$suppr_client_id.' a bien été supprimé.
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
                    <th>Prochain passage</th>
                    <th>Jour de collecte</th>
                    <th>Remarques</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM client AS c
                               INNER JOIN localite AS l
                               ON c.localite_id = l.localite_id
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
                                <td>'.timestampToDate($ligneSQL['prochain_passage']).'</td>
                                <td>'.$ligneSQL['jour_collect'].'</td>
                                <td>'.$ligneSQL['remarques'].'</td>
                                <td>
                                    <a href="gestionClients.php?client_id='.$ligneSQL['client_id'].'"">
                                        Modifier
                                    </a>
                                    <br/>
                                    <a href="suppressionClients.php?client_id='.$ligneSQL['client_id'].'">
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
