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
        <title>Oust - Missions</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="wrapper" class="missions">
            <h2>Missions</h2>
			<hr>
            <form method="post" action="consulterMissions.php">
                Localité
                <select name="flocalite_id">
                <?php
                    $reqSQL1 = 'SELECT *
                                FROM localite';
                    $resSQL1 = connexion($reqSQL1, 'select');
                    
                    while ($ligneSQL1 = $resSQL1->fetch())
                    {
                        echo '<option value="'.$ligneSQL1['localite_id'].'">'.$ligneSQL1['localite'].'</option>';
                    }	
                ?>
                </select>
                <input type="text" name="fmission_id" value="<?php echo date('Y-m-d'); ?>"/>
                <input type="submit" name="button" value="Consulter mission"/>
            </form>
            <br/>
            <?php
                if (isset($ajout_mission_id))
                {
                    echo '<p id="erreur">
                            La mission '.$ajout_mission_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_mission_id))
                {
                    echo '<p id="erreur">
                            La mission '.$mod_mission_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_mission_id))
                {
                    echo '<p id="erreur">
                            La mission '.$suppr_mission_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>Date</th>
                    <th>Localit&eacute</th>
                    <th>Commune</th>
                    <th>Canton</th>
                    <th>Nom employ&eacute</th>
                    <th>Pr&eacutenom employ&eacute</th>
                    <th>Plaque</th>
                    <th>Mod&egravele</th>
                    <th>Distance (km)</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *,
                                       l.localite_id
                               FROM mission AS m
                               INNER JOIN localite AS l
                               ON m.localite_id = l.localite_id
                               INNER JOIN commune AS c
                               ON l.commune_id = c.commune_id
                               INNER JOIN employe AS e
                               ON m.employe_id = e.employe_id
                               INNER JOIN vehicule AS v
                               ON m.vehicule_id = v.vehicule_id
                               ORDER BY mission_id DESC';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while ($ligneSQL = $resSQL->fetch())
                    {
                        echo '
                            <tr>
                                <td>'.timestampToDate($ligneSQL['mission_id']).'</td>
                                <td>'.$ligneSQL['localite'].'</td>
                                <td>'.$ligneSQL['commune'].'</td>
                                <td>'.$ligneSQL['canton'].'</td>
                                <td>'.$ligneSQL['nom'].'</td>
                                <td>'.$ligneSQL['prenom'].'</td>
                                <td>'.$ligneSQL['plaque'].'</td>
                                <td>'.$ligneSQL['modele'].'</td>
                                <td>'.$ligneSQL['distance_parcourue_km'].'</td>
                                <td>
                                    <a href="gestionMissions.php?mission_id='.$ligneSQL['mission_id'].'&employe_id='.$ligneSQL['employe_id'].'&localite_id='.$ligneSQL['localite_id'].'">
                                        Modifier
                                    </a>
                                    <br/>
                                    <a href="suppressionMissions.php?mission_id='.$ligneSQL['mission_id'].'&employe_id='.$ligneSQL['employe_id'].'&localite_id='.$ligneSQL['localite_id'].'">
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
