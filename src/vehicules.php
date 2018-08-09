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
        <title>Oust - V&eacutehicules</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="vehicules">
            <h2>V&eacutehicules</h2>
			<hr>
            <?php
                if (isset($ajout_vehicule_id))
                {
                    echo '<p id="erreur">
                            Le véhicule '.$ajout_vehicule_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_vehicule_id))
                {
                    echo '<p id="erreur">
                            Le véhicule '.$mod_vehicule_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_vehicule_id))
                {
                    echo '<p id="erreur">
                            Le véhicule '.$suppr_vehicule_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>ID</th>
                    <th>Plaque</th>
                    <th>Mod&egravele</th>
                    <th>Kilom&eacutetrage</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM vehicule';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr>
                              <td>'.$ligneSQL['vehicule_id'].'</td>
                              <td>'.$ligneSQL['plaque'].'</td>
                              <td>'.$ligneSQL['modele'].'</td>
                              <td>'.$ligneSQL['kilometrage'].'</td>
                                    <td>
                                        <a href="gestionVehicules.php?vehicule_id='.$ligneSQL['vehicule_id'].'"">
                                            Modifier
                                        </a>
                                        <br/>
                                        <a href="suppressionVehicules.php?vehicule_id='.$ligneSQL['vehicule_id'].'">
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
