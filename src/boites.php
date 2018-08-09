<!DOCTYPE html>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
       // header('location:index.php');
       // exit();
    }
    
    extract(@$_GET);
?>

<html lang="fr">
    <head>
        <title>Oust - Bo&icirctes</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
	 <?php include 'menu.php'; ?>
        <div id ="wrapper" class="boites">
            <h2>Bo&icirctes</h2>
			<hr>
            <?php
                if (isset($ajout_boite_id))
                {
                    echo '<p id="erreur">
                            La boîte '.$ajout_boite_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_boite_id))
                {
                    echo '<p id="erreur">
                            La boîte '.$mod_boite_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_boite_id))
                {
                    echo '<p id="erreur">
                            La boîte '.$suppr_boite_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>ID</th>
                    <th>Format</th>
                    <th>Prix</th>
					<th>Prenom Client</th>
					<th>Nom Client</th>
                    <th>&Eacutetat</th>
                    <th>Pr&ecirct</th>
                    <th>Retour</th>
					<th>Update</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM client AS c
							   RIGHT JOIN boite AS b
							   ON b.client_id = c.client_id
							   ORDER BY boite_id';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr>
                              <td>'.$ligneSQL['boite_id'].'</td>
                              <td>'.$ligneSQL['format_boite'].'</td>
                              <td>'.$ligneSQL['prix'].'</td>
                              <td>'.$ligneSQL['nom'].'</td>
                              <td>'.$ligneSQL['prenom'].'</td>
                              <td>'.$ligneSQL['etat'].'</td>
                              <td>'.timestampToDate($ligneSQL['date_pret']).'</td>
                              <td>'.timestampToDate($ligneSQL['date_retour']).'</td>
                              <td>'.timestampToDate($ligneSQL['last_update']).'</td>
                              <td>
                                    <a href="gestionBoites.php?boite_id='.$ligneSQL['boite_id'].'"">
                                        Modifier
                                    </a>
                                    <br/>
                                    <a href="suppressionBoites.php?boite_id='.$ligneSQL['boite_id'].'">
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
